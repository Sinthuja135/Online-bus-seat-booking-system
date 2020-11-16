package com.example.travels;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.provider.ContactsContract;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class DashboardActivity extends AppCompatActivity {
    private Button button;
    private Button button1;
    private Button button2;
    private Button button3;
    private Session session;
    Button LogOut;
    String email = "";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashboard);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
       // session = new Session(this);
        //session.setEmail("email");
        Bundle b=new Bundle();
        b=getIntent().getExtras();
        if(b != null){
            email=b.getString("email");
        }


        session=new Session(this);
        session.setEmail(email);

        button=findViewById(R.id.buttonSeatBooking);
        ((View) button).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivity2();
            }
        });
        button1=findViewById(R.id.buttonSeatResrvation);
        ((View) button1).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivity3();
            }
        });

        button2=findViewById(R.id.buttonAboutUs);
        ((View) button2).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivity4();
            }
        });

        button3=findViewById(R.id.buttonNews);
        ((View) button3).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivity5();
            }
        });
        LogOut = (Button)findViewById(R.id.button);



        Intent intent = getIntent();


        LogOut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                SharedPreferences settings = getSharedPreferences("PREFS_NAME", 0);
                settings.edit().clear().apply();
                SharedPreferences prefs = getSharedPreferences("email_name", 0);
                prefs.edit().clear().apply();
                finish();
                commonFIle.isChecked = false;

                Intent intent = new Intent(DashboardActivity.this, UserLoginActivity.class);

                startActivity(intent);

                Toast.makeText(DashboardActivity.this, "Log Out Successfully", Toast.LENGTH_LONG).show();


            }
        });
    }
    public void openActivity2(){
        Intent intent=new Intent(this,SeatBookingActivity.class);
        startActivity(intent);
    }
    public void openActivity3(){
        Intent intent1=new Intent(this,BusReservationActivity.class);
        startActivity(intent1);
    }

    public void openActivity4(){
        Intent intent2=new Intent(this,AboutUsActivity.class);
        startActivity(intent2);
    }

    public void openActivity5(){
        Intent intent3=new Intent(this,News.class);
        startActivity(intent3);
    }
}