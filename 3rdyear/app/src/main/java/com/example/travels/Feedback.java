package com.example.travels;


import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RatingBar;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

public class Feedback extends AppCompatActivity {

    RatingBar rating;
    String ratingg;
    float rate1;
    Boolean tmp =false;
//    Button getRating;


    EditText etName, etFeedback;
    Button bsubmit;
    String name,feedback;
//    String DataParseUrl = commonFIle.port + "/insertitem.php";
        String DataParseUrl = "http://192.168.8.170/Dilmi/insertitem.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_feedback);

        etName = (EditText) findViewById(R.id.etName);
        etFeedback = (EditText) findViewById(R.id.etFeedback);
        rating = (RatingBar) findViewById(R.id.rating);

        bsubmit = (Button) findViewById(R.id.bsubmit);

        bsubmit.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {

                tmp = !tmp;
                v.setBackgroundColor(tmp ? Color.BLACK : Color.BLACK);
                // TODO Auto-generated method stub
                if (validationSuccess()) {
                    GetDataFromEditText();

                    SendDataToServer(name,feedback,ratingg);
                }
            }
        });
    }


    public void GetDataFromEditText() {

        name = etName.getText().toString();
        feedback = etFeedback.getText().toString();


        rating.getRating();
        ratingg= String.valueOf(rating);

    }


    public void SendDataToServer(final String name, final String feedback,final String ratingg) {
        class SendPostReqAsyncTask extends AsyncTask<String, Void, String> {
            @Override
            protected String doInBackground(String... params) {

                String QuickName = name;

                String QuickFeedback = feedback;
                String QuickRating = ratingg;
                List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();

                nameValuePairs.add(new BasicNameValuePair("name", QuickName));

                nameValuePairs.add(new BasicNameValuePair("feedback", QuickFeedback));
                nameValuePairs.add(new BasicNameValuePair("ratingg", QuickRating));

                try {
                    HttpClient httpClient = new DefaultHttpClient();

                    HttpPost httpPost = new HttpPost(DataParseUrl);

                    httpPost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

                    HttpResponse response = httpClient.execute(httpPost);

                    HttpEntity entity = response.getEntity();


                } catch (ClientProtocolException e) {

                } catch (IOException e) {

                }
                return "Data Submit Successfully";
            }

            @Override
            protected void onPostExecute(String result) {
                super.onPostExecute(result);

                Toast.makeText(Feedback.this, "Data added Successfully", Toast.LENGTH_LONG).show();

            }
        }
        SendPostReqAsyncTask sendPostReqAsyncTask = new SendPostReqAsyncTask();
        sendPostReqAsyncTask.execute(name, feedback,ratingg);
    }
    private Boolean validationSuccess() {

//        if (etName.getText().toString().equalsIgnoreCase("")) {
//            Toast.makeText(getApplicationContext(), "Please enter place", Toast.LENGTH_SHORT).show();
//            return false;
//        }
//
//        }
        if (etFeedback.getText().toString().equalsIgnoreCase("")) {
            Toast.makeText(getApplicationContext(), "Please enter Description", Toast.LENGTH_SHORT).show();
            return false;
        }



        return true;
    }

}