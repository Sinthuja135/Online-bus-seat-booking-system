package com.example.travels;


import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Color;
import android.graphics.SweepGradient;
import android.graphics.Typeface;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.util.TypedValue;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.paypal.android.sdk.payments.PayPalConfiguration;
import com.paypal.android.sdk.payments.PayPalPayment;
import com.paypal.android.sdk.payments.PayPalService;
import com.paypal.android.sdk.payments.PaymentActivity;
import com.paypal.android.sdk.payments.PaymentConfirmation;

import org.json.JSONException;
import org.json.JSONObject;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.List;

public class SeatSelectActivity extends AppCompatActivity implements View.OnClickListener {
    ViewGroup layout;
    String first;
    String second;
    String third;
    String fourth;
    String five;
    String six;
    String seven;
    String eight;
    String nine;
    String ten;
    String eleven;
    String twelve;
    String thirteen;
    String fourteen;
    String fifteen;
    String space;
    String seats;
    ProgressDialog progressDialog;
    HashMap<String,String> hashMap = new HashMap<>();
    HttpParse httpParse = new HttpParse();
    String finalResult ;
    private Session session;
//    String HttpURL = commonFIle.port + "/php/detail/updateSeatValue.php";
        String HttpURL = "http://192.168.8.170/Dilmi/updateSeatValue.php";
    public static final int PAYPAL_REQUEST_CODE = 123;


    //Paypal Configuration Object
    private static PayPalConfiguration config = new PayPalConfiguration()
            // Start with mock environment.  When ready, switch to sandbox (ENVIRONMENT_SANDBOX)
            // or live (ENVIRONMENT_PRODUCTION)
            .environment(PayPalConfiguration.ENVIRONMENT_NO_NETWORK)
            .clientId(PayPalConfig.PAYPAL_CLIENT_ID);
//    String seats =
//            "________/"+"UU__RR/"+ "UU__AA/"
//            + "AA__AA/"
//            + "AA__AA/"
//            + "UU__AA/"
//            + "AA__UU/"
//            + "UU__RR/"
//            + "UU__AA/"
//            + "AA__AA/"
//            + "AA__AA/"
//            + "UU__AA/"
//            + "AA__UU/"
//            + "AA__RR/"
//            + "AA__RR/"
//            + "AAUUAA/"
//            + "______/";

    List<TextView> seatViewList = new ArrayList<>();
    int seatSize = 110;
    int seatGaping = 10;

    int STATUS_AVAILABLE = 1;
    int STATUS_BOOKED = 2;
    int STATUS_RESERVED = 3;
    String selectedIds = "";
    String date;
    String from;
    String emailName;
    String AC;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_seat_select);

        Intent intent = new Intent(this, PayPalService.class);

        intent.putExtra(PayPalService.EXTRA_PAYPAL_CONFIGURATION, config);


        Bundle b  = new Bundle();
        b = getIntent().getExtras();
        date =  b.getString("date");
        from = b.getString("from");
        AC=b.getString("ac");
        startService(intent);
        //session = new Session(this);
        // emailName = session.getEmail();

        SharedPreferences prefs = getSharedPreferences("email_name", 0);
        emailName = prefs.getString("email", "");
        //SharedPreferences.Editor editor = settings.edit();

        try {
            JSONObject reader = new JSONObject(getIntent().getStringExtra("reader"));

            first = reader.getString("first");
            second = reader.getString("second");
            third = reader.getString("third");
            fourth = reader.getString("fourth");
            five = reader.getString("five");
            six = reader.getString("six");
            seven = reader.getString("seven");
            eight = reader.getString("eight");
            nine = reader.getString("nine");
            ten = reader.getString("ten");
            eleven = reader.getString("eleven");
            twelve = reader.getString("twelve");
            thirteen = reader.getString("thirteen");
            fourteen = reader.getString("fourteen");
            fifteen = reader.getString("fifteen");
            space = reader.getString("space");



        } catch (JSONException e) {
            e.printStackTrace();
        }

       // seats = space+"/"
        seats = space+"/"
                +first+"/"
                +second+"/"
                +third+"/"
                +fourth+"/"
                +five+"/"
                +six+"/"
                +seven+"/"
                +eight+"/"
                +nine+"/"
                +ten+"/"
                +eleven+"/"
                +twelve+"/"
                +thirteen+"/"
                +fourteen+"/"
                +fifteen+"/"
                +space+"/";

        layout = findViewById(R.id.layoutSeat);

        seats = "/" + seats;

        LinearLayout lay_r = new LinearLayout(this);
        LinearLayout.LayoutParams lay = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, 100);
        lay_r.setOrientation(LinearLayout.VERTICAL);
        lay_r.setLayoutParams(lay);

        LinearLayout.LayoutParams tes = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, 100);
        tes.setMargins(80,15,8,8);
        TextView text = new TextView(this);
        text.setText("Seat Details");
        text.setTextSize(20);
        text.setGravity(Gravity.CENTER_HORIZONTAL);
        text.setTypeface(null, Typeface.BOLD);
        text.setLayoutParams(tes);
        lay_r.addView(text);
        layout.addView(lay_r);




        LinearLayout lay_r_capture = new LinearLayout(this);
        LinearLayout.LayoutParams layparam = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, 200);
        lay_r_capture.setOrientation(LinearLayout.HORIZONTAL);
        lay_r_capture.setLayoutParams(layparam);

        LinearLayout.LayoutParams lp = new LinearLayout.LayoutParams(150, 200);
        lp.setMargins(8,8,8,8);
        ImageView img1 = new ImageView(this);
        img1.setImageResource(R.drawable.ic_seats_booked);
        img1.setLayoutParams(lp);



        LinearLayout.LayoutParams jstw = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, 200);
        jstw.setMargins(80,8,8,8);
        TextView textView2 = new TextView(this);
        textView2.setText("Booked");
        textView2.setTextSize(18);
        textView2.setGravity(Gravity.CENTER_VERTICAL);
        textView2.setLayoutParams(jstw);
        lay_r_capture.addView(img1);
        lay_r_capture.addView(textView2);
        layout.addView(lay_r_capture);



        LinearLayout capture = new LinearLayout(this);
        LinearLayout.LayoutParams param = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, 200);
        capture.setOrientation(LinearLayout.HORIZONTAL);
        capture.setLayoutParams(param);

        LinearLayout.LayoutParams lps = new LinearLayout.LayoutParams(150, 200);
        lps.setMargins(8,8,8,0);
        ImageView img2 = new ImageView(this);
        img2.setImageResource(R.drawable.ic_seats_book);
        img2.setLayoutParams(lps);


        LinearLayout.LayoutParams jst = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, 200);
        jst.setMargins(80,8,8,0);
        TextView textView = new TextView(this);
        textView.setText("Available");
        textView.setTextSize(18);
        textView.setGravity(Gravity.CENTER_VERTICAL);
        textView.setLayoutParams(jst);
        capture.addView(img2);
        capture.addView(textView);
        layout.addView(capture);


        LinearLayout layoutSeat = new LinearLayout(this);
        LinearLayout.LayoutParams params = new LinearLayout.LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT, ViewGroup.LayoutParams.WRAP_CONTENT);
        layoutSeat.setOrientation(LinearLayout.VERTICAL);
        layoutSeat.setLayoutParams(params);
        layoutSeat.setPadding(15 * seatGaping, 0, 8 * seatGaping, 8 * seatGaping);
        layout.addView(layoutSeat);


        LinearLayout buttonLayout = new LinearLayout(this);
        LinearLayout.LayoutParams buttonparam = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, 200);
        buttonLayout.setOrientation(LinearLayout.VERTICAL);
        buttonLayout.setLayoutParams(buttonparam);

        LinearLayout.LayoutParams butnlps = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.MATCH_PARENT, 150);
        butnlps.setMargins(80,8,20,8);
        Button btn1 = new Button(this);
        btn1.setText("CONFIRM");
        btn1.setBackgroundColor(Color.parseColor("#008fb3"));
        btn1.setLayoutParams(butnlps);
        btn1.setGravity(Gravity.CENTER_HORIZONTAL);
        buttonLayout.addView(btn1);
        layout.addView(buttonLayout);

        LinearLayout layout = null;

        int count = 0;

        for (int index = 0; index < seats.length(); index++) {
            if (seats.charAt(index) == '/') {
                layout = new LinearLayout(this);
                layout.setOrientation(LinearLayout.HORIZONTAL);
                layoutSeat.addView(layout);
            }
            else if (seats.charAt(index) == 'U') {
                count++;
                TextView view = new TextView(this);
                LinearLayout.LayoutParams layoutParams = new LinearLayout.LayoutParams(seatSize, seatSize);
                layoutParams.setMargins(seatGaping, seatGaping, seatGaping, seatGaping);
                view.setLayoutParams(layoutParams);
                view.setPadding(0, 0, 0, 2 * seatGaping);
                view.setId(count);
                view.setGravity(Gravity.CENTER);
                view.setBackgroundResource(R.drawable.ic_seats_booked);
                view.setTextColor(Color.WHITE);
                view.setTag(STATUS_BOOKED);
                view.setText(count + "");
                view.setTextSize(TypedValue.COMPLEX_UNIT_DIP, 9);
                layout.addView(view);
                seatViewList.add(view);
                view.setOnClickListener(this);
            }
            else if (seats.charAt(index) == 'A') {
                count++;
                TextView view = new TextView(this);
                LinearLayout.LayoutParams layoutParams = new LinearLayout.LayoutParams(seatSize, seatSize);
                layoutParams.setMargins(seatGaping, seatGaping, seatGaping, seatGaping);
                view.setLayoutParams(layoutParams);
                view.setPadding(0, 0, 0, 2 * seatGaping);
                view.setId(count);
                view.setGravity(Gravity.CENTER);
                view.setBackgroundResource(R.drawable.ic_seats_book);
                view.setText(count + "");
                view.setTextSize(TypedValue.COMPLEX_UNIT_DIP, 9);
                view.setTextColor(Color.BLACK);
                view.setTag(STATUS_AVAILABLE);
                layout.addView(view);
                seatViewList.add(view);
                view.setOnClickListener(this);
            }
            else if (seats.charAt(index) == 'R') {
                count++;
                TextView view = new TextView(this);
                LinearLayout.LayoutParams layoutParams = new LinearLayout.LayoutParams(seatSize, seatSize);
                layoutParams.setMargins(seatGaping, seatGaping, seatGaping, seatGaping);
                view.setLayoutParams(layoutParams);
                view.setPadding(0, 0, 0, 2 * seatGaping);
                view.setId(count);
                view.setGravity(Gravity.CENTER);
                view.setBackgroundResource(R.drawable.ic_seats_reserved);
                view.setText(count + "");
                view.setTextSize(TypedValue.COMPLEX_UNIT_DIP, 9);
                view.setTextColor(Color.WHITE);
                view.setTag(STATUS_RESERVED);
                layout.addView(view);
                seatViewList.add(view);
                view.setOnClickListener(this);
            }
            else if (seats.charAt(index) == '_') {
                TextView view = new TextView(this);
                LinearLayout.LayoutParams layoutParams = new LinearLayout.LayoutParams(seatSize, seatSize);
                layoutParams.setMargins(seatGaping, seatGaping, seatGaping, seatGaping);
                view.setLayoutParams(layoutParams);
                view.setBackgroundColor(Color.TRANSPARENT);
                view.setText("");
                layout.addView(view);
            }
        }

        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                if(selectedIds.length() == 0 ){
                    Toast.makeText(SeatSelectActivity.this, "Please select a Seat....!",Toast.LENGTH_LONG).show();
                } else {

                getPayment();
                   // updateSeatActivity();
                }
            }
        });
    }

    @Override
    public void onDestroy() {
        stopService(new Intent(this, PayPalService.class));
        super.onDestroy();
    }

    private void getPayment() {



        ArrayList<String> items = new  ArrayList<String>(Arrays.asList(selectedIds.split(",")));

        int paymentAmount = items.size() * Integer.parseInt(commonFIle.Price);
        //Creating a paypalpayment
        PayPalPayment payment = new PayPalPayment(new BigDecimal(String.valueOf(paymentAmount)), "USD", "Travel Fees",
                PayPalPayment.PAYMENT_INTENT_SALE);

        //Creating Paypal Payment activity intent
        Intent intent = new Intent(this, PaymentActivity.class);

        //putting the paypal configuration to the intent
        intent.putExtra(PayPalService.EXTRA_PAYPAL_CONFIGURATION, config);

        //Puting paypal payment to the intent
        intent.putExtra(PaymentActivity.EXTRA_PAYMENT, payment);

        //Starting the intent activity for result
        //the request code will be used on the method onActivityResult
        startActivityForResult(intent, PAYPAL_REQUEST_CODE);
    }

    @Override
    public void onClick(View view) {
        if ((int) view.getTag() == STATUS_AVAILABLE) {
            if (selectedIds.contains(view.getId() + ",")) {
                selectedIds = selectedIds.replace(+view.getId() + ",", "");
                view.setBackgroundResource(R.drawable.ic_seats_book);
            } else {
                selectedIds = selectedIds + view.getId() + ",";
                view.setBackgroundResource(R.drawable.ic_seats_selected);

            }
        } else if ((int) view.getTag() == STATUS_BOOKED) {
            Toast.makeText(this, "Seat " + view.getId() + " is Already Booked", Toast.LENGTH_SHORT).show();
        } else if ((int) view.getTag() == STATUS_RESERVED) {
            Toast.makeText(this, "Seat " + view.getId() + " is Reserved", Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        //If the result is from paypal
        if (requestCode == PAYPAL_REQUEST_CODE) {

            //If the result is OK i.e. user has not canceled the payment
            if (resultCode == Activity.RESULT_OK) {
                //Getting the payment confirmation
                PaymentConfirmation confirm = data.getParcelableExtra(PaymentActivity.EXTRA_RESULT_CONFIRMATION);

                //if confirmation is not null
                if (confirm != null) {
                    try {
                        updateSeatActivity();

                        //Getting the payment details
                        String paymentDetails = confirm.toJSONObject().toString(4);
                        Log.i("paymentExample", paymentDetails);
//
//                        //Starting a new activity for the payment details and also putting the payment details with intent
                        startActivity(new Intent(this, FinalActivity.class)
                                .putExtra("PaymentDetails", paymentDetails)
                                .putExtra("PaymentAmount", commonFIle.Price));



                    } catch (JSONException e) {
                        Log.e("paymentExample", "an extremely unlikely failure occurred: ", e);
                    }
                }
            } else if (resultCode == Activity.RESULT_CANCELED) {
                Log.i("paymentExample", "The user canceled.");
            } else if (resultCode == PaymentActivity.RESULT_EXTRAS_INVALID) {
                Log.i("paymentExample", "An invalid Payment or PayPalConfiguration was submitted. Please see the docs.");
            }
        }
    }

    public void updateSeatActivity(){

        class getSeat extends AsyncTask<String,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = ProgressDialog.show(SeatSelectActivity.this,"Loading Data",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);


                progressDialog.dismiss();

                if(httpResponseMsg != null) {

                    Toast.makeText(SeatSelectActivity.this, "SuccessFully Updated..!",Toast.LENGTH_LONG).show();

                } else {
                    Toast.makeText(SeatSelectActivity.this, "Cannot update the Seat to local DB...! please try again..!",Toast.LENGTH_LONG).show();
                }


            }

            @Override
            protected String doInBackground(String... params) {

                hashMap.put("selectedID",selectedIds);
                hashMap.put("date", date);
                hashMap.put("from", from);
                hashMap.put("ac", AC);

                hashMap.put("emailAddress", emailName);

                finalResult = httpParse.postRequest(hashMap, HttpURL);

                return finalResult;
            }
        }

        getSeat userLoginClass = new getSeat();

        userLoginClass.execute();
    }
}
