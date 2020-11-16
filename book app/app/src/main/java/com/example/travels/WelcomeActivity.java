package com.example.travels;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class WelcomeActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_welcome);

        SharedPreferences settings1 = getSharedPreferences("PREFS_NAME", 0);
        commonFIle.isChecked = settings1.getBoolean("isChecked", false);

        Thread thread=new Thread(){

            @Override
            public void run() {
                try {
                    sleep(3000);

                    if (commonFIle.isChecked) {
                        Intent i = new Intent(WelcomeActivity.this, DashboardActivity.class);
                        startActivity(i);
                    } else {
                        Intent intent=new Intent(getApplicationContext(),HomeActivity.class);
                        startActivity(intent);
                    }

                    finish();
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        };
        thread.start();
    }
}