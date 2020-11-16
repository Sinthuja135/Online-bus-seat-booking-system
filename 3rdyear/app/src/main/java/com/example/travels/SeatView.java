package com.example.travels;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class SeatView extends AppCompatActivity {

    ProgressDialog progressDialog;
    HashMap<String,String> hashMap = new HashMap<>();
    HttpParse httpParse = new HttpParse();
    String finalResult ;
//    String HttpURL = commonFIle.port + "/php/detail/seatAvailable.php";
    String HttpURL = "http://192.168.8.170/Dilmi/seatAvailable.php";
    String date;
    String from;
    String To;
    String AC;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_seat_view);

        Bundle b = new Bundle();
        b = getIntent().getExtras();
        date = b.getString("date");
        from = b.getString("from");
        To = b.getString("To");
        AC = b.getString("ac");


        TextView fromText = findViewById(R.id.fromTextValue);
        fromText.setText(from);

        TextView toText = findViewById(R.id.ToTextValue);
        toText.setText(To);

        TextView dateText = findViewById(R.id.DateTextValue);
        dateText.setText(date);

        TextView timetext = findViewById(R.id.TimeTextValue);
        timetext.setText(commonFIle.time);

        TextView bustype = findViewById(R.id.busTypeValue);
        bustype.setText(AC);

        TextView priceText = findViewById(R.id.PriceValue);
        if(AC.equals(commonFIle.AC)){
            priceText.setText("$ "+ commonFIle.ACPrice);
        } else {
            priceText.setText("$ "+ commonFIle.Price);
        }


        Button viewSeatsButton = findViewById(R.id.viewSeats);
        viewSeatsButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                getSeatActivity();

            }
        });


    }

    public void getSeatActivity(){

        class getSeat extends AsyncTask<String,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = ProgressDialog.show(SeatView.this,"Loading Data",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);


                progressDialog.dismiss();

                if(httpResponseMsg != null) {

                    try {
                        JSONObject reader= new JSONObject(httpResponseMsg);
                        Intent intent = new Intent(SeatView.this, SeatSelectActivity.class);
                        intent.putExtra("reader",reader.toString());
                        intent.putExtra("date", date);
                        intent.putExtra("from", from);
                        intent.putExtra("ac",AC);
                        startActivity(intent);

                    } catch (JSONException e) {
                        e.printStackTrace();
                    }


                } else {
                    Toast.makeText(SeatView.this, "Something went wrong...! please try again..!",Toast.LENGTH_LONG).show();
                }


            }

            @Override
            protected String doInBackground(String... params) {


                hashMap.put("date", date);
                hashMap.put("from", from);
                hashMap.put("to", To);
                hashMap.put("ac", AC);


                finalResult = httpParse.postRequest(hashMap, HttpURL);

                return finalResult;
            }
        }

        getSeat userLoginClass = new getSeat();

        userLoginClass.execute();
    }
}
