package com.example.travels;

import android.app.DatePickerDialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.AsyncTask;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.Calendar;
import java.util.HashMap;

public class SeatBookingActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    EditText Email, Password;
    Button LogIn ;
    String PasswordHolder, EmailHolder;
    String finalResult ;
//    String HttpURL = commonFIle.port + "/php/detail/seat.php";
        String HttpURL = "http://192.168.8.170/Dilmi/seat.php";
    Boolean CheckDropDownValid = false;
    ProgressDialog progressDialog;
    HashMap<String,String> hashMap = new HashMap<>();
    HttpParse httpParse = new HttpParse();
    String selectedToSpinner = "";
    String selectedFromSpinner = "";
    public static final String UserEmail = "";
    private TextView mDisplayDate;
    private DatePickerDialog.OnDateSetListener mDateSetListener;
    private static final String TAG = "SeatBooking";
    private Spinner ACspinner;
    private Spinner spinner;
    private Spinner Fromspinner;
    private static final String[] paths = {"Departure From..","Badulla", "Jaffna"};
    private static final String[] path = {"Arrival To..","Jaffna", "Badulla"};
    private static final String[] Acpath = {commonFIle.AC, commonFIle.NAC};
    String JaffnaSelcted = "";
    String badullaSelected = "";
    String SecondbadullaSelected = "";
    String SecondJaffnaSelcted = "";
    String ACSelected = "";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_seat_booking);

        StrictMode.ThreadPolicy threadPolicy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(threadPolicy);
        mDisplayDate = (TextView) findViewById(R.id.date);


        //get the spinner from the xml.
        spinner = findViewById(R.id.to);
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(SeatBookingActivity.this,
                android.R.layout.simple_spinner_item,paths);

        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(this);


        Fromspinner = findViewById(R.id.from);
        ArrayAdapter<String> adapter2 = new ArrayAdapter<String>(SeatBookingActivity.this,
                android.R.layout.simple_spinner_item,path);

        adapter2.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        Fromspinner.setAdapter(adapter2);
        Fromspinner.setOnItemSelectedListener(this);


        ACspinner = findViewById(R.id.ac);
        ArrayAdapter<String> Acadapter = new ArrayAdapter<String>(SeatBookingActivity.this,
                android.R.layout.simple_spinner_item,Acpath);

        Acadapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        ACspinner.setAdapter(Acadapter);
        ACspinner.setOnItemSelectedListener(this);


        mDisplayDate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Calendar cal = Calendar.getInstance();
                int year = cal.get(Calendar.YEAR);
                int month = cal.get(Calendar.MONTH);
                int day = cal.get(Calendar.DAY_OF_MONTH);

                DatePickerDialog dialog = new DatePickerDialog(
                        SeatBookingActivity.this,
                        android.R.style.Theme_Holo_Light_Dialog_MinWidth,
                        mDateSetListener,
                        year, month, day);
                dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
                dialog.getDatePicker().setMinDate(System.currentTimeMillis() - 1000);
                dialog.show();
            }
        });


        mDateSetListener = new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker datePicker, int year, int month, int day) {

                month = month + 1;
                String months = String.format("%02d", month);
                String days = String.format("%02d", day);
                Log.d(TAG, "onDateSet: yyyy/mm/dd: " + year + "-" + months + "-" + day);

                String date = year + "-" + months + "-" + days;
                mDisplayDate.setText(date);
            }
        };





        Email = (EditText)findViewById(R.id.email);
        Password = (EditText)findViewById(R.id.password);
        LogIn = (Button)findViewById(R.id.Login);

        LogIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {



                CheckEditTextIsEmptyOrNot();

                if(CheckDropDownValid){

//                    Toast.makeText(SeatBookingActivity.this, "All Good:", Toast.LENGTH_LONG).show();
                    Intent intent = new Intent(SeatBookingActivity.this, SeatView.class);
                    intent.putExtra("date", mDisplayDate.getText());
                    intent.putExtra("from", Fromspinner.getSelectedItem().toString());
                    intent.putExtra("To", spinner.getSelectedItem().toString());
                    intent.putExtra("ac", ACspinner.getSelectedItem().toString());

                    startActivity(intent);


                }
                else {

                    Toast.makeText(SeatBookingActivity.this, "Please Select valid values", Toast.LENGTH_LONG).show();

                }

            }
        });
    }
    public void CheckEditTextIsEmptyOrNot(){
        if(JaffnaSelcted == SecondJaffnaSelcted){
            CheckDropDownValid = false;

        } else if (badullaSelected == SecondbadullaSelected){
            CheckDropDownValid = false;
        } else if(Fromspinner.getSelectedItem().toString() == "Departure From..") {
            CheckDropDownValid = false;
        }else if(spinner.getSelectedItem().toString() == "Arrival To..") {
            CheckDropDownValid = false;
        }else if(mDisplayDate.getText().toString() == getResources().getString(R.string.SelectDate)) {
            CheckDropDownValid = false;
        }else {
            CheckDropDownValid = true;
        }

    }


    @Override
    public void onItemSelected(AdapterView<?> parent, View v, int position, long id) {

        if(parent.getId() == R.id.to)
        {
            switch (position) {
                case 0:
                    break;
                case 1:
                    // Whatever you want to happen when the second item gets selected
                    badullaSelected = "Badulla";
                    JaffnaSelcted = "";
                    break;
                case 2:
                    JaffnaSelcted = "Jaffna";
                    badullaSelected = "";
                    break;

            }
        }
        else if(parent.getId() == R.id.from)
        {
            switch (position) {
                case 0:
                    break;
                case 1:
                    // Whatever you want to happen when the second item gets selected
                    SecondJaffnaSelcted = "Jaffna";
                    SecondbadullaSelected = "";
                    break;
                case 2:
                    SecondbadullaSelected = "Badulla";
                    SecondJaffnaSelcted = "";
                    break;

            }
        }
        else if(parent.getId() == R.id.ac)
        {
            switch (position) {
                case 0:
                    ACSelected = "AC";
                    break;
                case 1:
                    // Whatever you want to happen when the second item gets selected
                    ACSelected = "NONAC";
                    break;


            }
        }

    }

    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }
}