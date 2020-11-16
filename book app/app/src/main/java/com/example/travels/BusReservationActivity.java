package com.example.travels;


import android.Manifest;
import android.app.ListActivity;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.StrictMode;


import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.app.DatePickerDialog;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;

import java.io.InputStream;
import java.util.Calendar;
import android.app.TimePickerDialog;

import android.widget.TimePicker;


import android.os.AsyncTask;

import android.os.Bundle;
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



public class BusReservationActivity extends AppCompatActivity {

    TextView chooseTime;
    TimePickerDialog timePickerDialog;

    Calendar calendar;
    int currentHour;
    int currentMinute;
    String amPm;
    //    public static String url = commonFIle.port + "/insert.php";
    String url = "http://192.168.8.170/Dilmi/insert.php";
    EditText num1;
    TextView resu;
    int res;
    Spinner etfrom ,etto, etpeople,etbustype;
    //    String bustype1;
    EditText  etday,etdate,ettime;
    String  bustype;
    String from;
    String to;
    String people;
    String day;
    //    String emailAddress;
    String time;
    String date;
    String price;
    TextView  etprice;
    Button button, button2,btn;
    String emailName;

    InputStream is = null;
    private static final String TAG = "MainActivity";

    private TextView mDisplayDate;
    private DatePickerDialog.OnDateSetListener mDateSetListener;

    String exceptionMessage = "There seems to be some problem connecting to database. " +
            "Please check your Internet Connection and try again.";
    String successMessage = "Data has been entered successfully";


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bus_reservation);

        StrictMode.ThreadPolicy threadPolicy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(threadPolicy);
        mDisplayDate = (EditText) findViewById(R.id.startdate);
        btn = (Button) findViewById(R.id.btnCall);


        SharedPreferences prefs = getSharedPreferences("email_name", 0);
        emailName = prefs.getString("email", "");


        mDisplayDate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Calendar cal = Calendar.getInstance();
                int year = cal.get(Calendar.YEAR);
                int month = cal.get(Calendar.MONTH);
                int day = cal.get(Calendar.DAY_OF_MONTH);

                DatePickerDialog dialog = new DatePickerDialog(
                        BusReservationActivity.this,
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



        chooseTime = findViewById(R.id.time);
        chooseTime.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                calendar = Calendar.getInstance();
                currentHour = calendar.get(Calendar.HOUR_OF_DAY);
                currentMinute = calendar.get(Calendar.MINUTE);

                timePickerDialog = new TimePickerDialog(BusReservationActivity.this, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker timePicker, int hourOfDay, int minutes) {
                        if (hourOfDay >= 12) {
                            amPm = "PM";
                        } else {
                            amPm = "AM";
                        }
                        chooseTime.setText(String.format("%02d:%02d", hourOfDay, minutes) + amPm);
                    }
                }, currentHour, currentMinute, false);

                timePickerDialog.show();
            }
        });




        Button button = (Button) findViewById(R.id.button);
        num1 = (EditText) findViewById(R.id.day);

        resu = (TextView) findViewById(R.id.price);

        button.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {

                String mynum1 = num1.getText().toString();
                float mnum1 = Float.parseFloat(mynum1);


                float res = mnum1 * 10000;
                resu.setText(String.valueOf(res));
                AlertDialog alertDialog = new AlertDialog.Builder(BusReservationActivity.this).create();
                alertDialog.setTitle("Alert");
                alertDialog.setMessage("Fixed payment calculate per day amount");
                alertDialog.setButton(AlertDialog.BUTTON_NEUTRAL, "OK",
                        new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int which) {
                                dialog.dismiss();
                            }
                        });
                alertDialog.show();
//                    Toast.makeText(getApplicationContext(),"Fixed payment calculate per day amount",Toast.LENGTH_LONG);

            }
        });

        Button button2 = (Button) findViewById(R.id.button2);
        //                    startActivity(new Intent(Reservation.this, Pop.class));
        etfrom = (Spinner) findViewById(R.id.from);
        ArrayAdapter<CharSequence> spinner = ArrayAdapter.createFromResource(this, R.array.android_layout_arrays2, android.R.layout.simple_spinner_item);
        spinner.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        etfrom.setAdapter(spinner);

        etto = (Spinner) findViewById(R.id.to);
        ArrayAdapter<CharSequence> spinner1 = ArrayAdapter.createFromResource(this, R.array.android_layout_arrays3, android.R.layout.simple_spinner_item);
        spinner.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        etto.setAdapter(spinner1);

        etbustype = (Spinner) findViewById(R.id.bustype);
        ArrayAdapter<CharSequence> spinner2 = ArrayAdapter.createFromResource(this, R.array.android_layout_arrays1, android.R.layout.simple_spinner_item);
        spinner.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        etbustype.setAdapter(spinner2);

        etpeople = (Spinner) findViewById(R.id.people);
        ArrayAdapter<CharSequence> spinner3 = ArrayAdapter.createFromResource(this, R.array.android_layout_arrays4, android.R.layout.simple_spinner_item);
        spinner.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        etpeople.setAdapter(spinner3);

//        etbustype = (EditText) findViewById(R.id.bustype);
//        etfrom = (EditText) findViewById(R.id.from);
        etdate = (EditText) findViewById(R.id.startdate);
        ettime = (EditText) findViewById(R.id.time);
//        etto = (EditText) findViewById(R.id.to);
//        etpeople = (EditText) findViewById(R.id.people);
        etday = (EditText) findViewById(R.id.day);
        etprice = (TextView) findViewById(R.id.price);
//        etphone = (EditText) findViewById(R.id.phone);

//        final Spinner finalSpinner = spinner;
        button2.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {

                bustype = etbustype.getSelectedItem().toString();
//                Toast.makeText(Reservation.this, bustype1, Toast.LENGTH_SHORT).show();
                from = etfrom.getSelectedItem().toString();
                to = etto.getSelectedItem().toString();
                people = etpeople.getSelectedItem().toString();
//                to = etto.getText().toString();
//                people = etpeople.getText().toString();
                day = etday.getText().toString();

//                phone = etphone.getText().toString();
                date = etdate.getText().toString();
                time = ettime.getText().toString();
                price = etprice.getText().toString();
//                price=resu;
                if (validationSuccess()) {
                    GetDataFromEditText();

                    SendDataToServer(bustype,from,date,time,to,people,day,price,emailName);

                }


            }

            public void GetDataFromEditText() {
                //                    bustype= spinner.getSelectedItem().toString();
                bustype = etbustype.getSelectedItem().toString();
//                Toast.makeText(Reservation.this, bustype1, Toast.LENGTH_SHORT).show();
                from = etfrom.getSelectedItem().toString();
                to = etto.getSelectedItem().toString();
                people = etpeople.getSelectedItem().toString();
//                to = etto.getText().toString();
//                people = etpeople.getText().toString();
                day = etday.getText().toString();

//                phone = etphone.getText().toString();
                date = etdate.getText().toString();
                time = ettime.getText().toString();
                price = etprice.getText().toString();

            }


            public  void SendDataToServer(final String bustype, final String from, final String date, final String time, final String to, final String people, final String day,final String price,final String emailName) {
                class SendPostReqAsyncTask extends AsyncTask<String, Void, String> {
                    @Override
                    protected String doInBackground(String... params) {
//                        String QuickBustype1 = bustype1;
                        String QuickBustype = bustype;
                        String QuickFrom = from;

                        String QuickDate = date;
                        String QuickTime =  time;
                        String QuickTo =to;
                        String QuickPeople = people;
                        String QuickeDay = day;
                        String QuickPrice = price;
                        String QuickemailName = emailName;
//                        String QuickPhone =phone;
                        List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
//                        nameValuePairs.add(new BasicNameValuePair("bustype1", QuickBustype1));
                        nameValuePairs.add(new BasicNameValuePair("bustype", QuickBustype));
                        nameValuePairs.add(new BasicNameValuePair("from_station", QuickFrom));
                        nameValuePairs.add(new BasicNameValuePair("journey_date",  QuickDate));
                        nameValuePairs.add(new BasicNameValuePair("journey_time",QuickTime ));
                        nameValuePairs.add(new BasicNameValuePair("to_station", QuickTo));
                        nameValuePairs.add(new BasicNameValuePair("people", QuickPeople));
                        nameValuePairs.add(new BasicNameValuePair("day", QuickeDay));
                        nameValuePairs.add(new BasicNameValuePair("price", QuickPrice));
//                        nameValuePairs.add(new BasicNameValuePair("phone", QuickPhone));
                        nameValuePairs.add(new BasicNameValuePair("emailAddress", QuickemailName));
                        try {
                            HttpClient httpClient = new DefaultHttpClient();

                            HttpPost httpPost = new HttpPost(url);

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

                        Toast.makeText(BusReservationActivity.this, "Added Successfully", Toast.LENGTH_LONG).show();

                    }
                }
                SendPostReqAsyncTask sendPostReqAsyncTask = new SendPostReqAsyncTask();
                sendPostReqAsyncTask.execute(bustype,from,date,time,to,people,day,price);

            }


            private Boolean validationSuccess() {
                if (etfrom.getSelectedItemPosition() == 0) {
                    Toast.makeText(getApplicationContext(), "Please select Origin", Toast.LENGTH_SHORT).show();
                    return false;
                }

                if (etbustype.getSelectedItemPosition() == 0) {
                    Toast.makeText(getApplicationContext(), "Please select bustype", Toast.LENGTH_SHORT).show();
                    return false;
                }
//                if (etfrom.getText().toString().equalsIgnoreCase("")) {
//                    Toast.makeText(getApplicationContext(), "Please enter place", Toast.LENGTH_SHORT).show();
//                    return false;
//                }

                if (etdate.getText().toString().equalsIgnoreCase("")) {
                    Toast.makeText(getApplicationContext(), "Please select date", Toast.LENGTH_LONG).show();
                    return false;
                }

                if (ettime.getText().toString().equalsIgnoreCase("")) {
                    Toast.makeText(getApplicationContext(), "Please pick time", Toast.LENGTH_LONG).show();
                    return false;

                }
                if (etto.getSelectedItemPosition() == 0) {
                    Toast.makeText(getApplicationContext(), "Please select Destination", Toast.LENGTH_SHORT).show();
                    return false;
                }
//                if (etpeople.getText().toString().equalsIgnoreCase("")) {
//                    Toast.makeText(getApplicationContext(), "Please enter number", Toast.LENGTH_LONG).show();
//                    return false;
//                }
                if (etpeople.getSelectedItemPosition() == 0) {
                    Toast.makeText(getApplicationContext(), "Please select No of people", Toast.LENGTH_SHORT).show();
                    return false;
                }
                if (etday.getText().toString().equalsIgnoreCase("")) {
                    Toast.makeText(getApplicationContext(), "Please enter days", Toast.LENGTH_LONG).show();
                    return false;
                }

                if (etprice.getText().toString().equalsIgnoreCase("")) {
                    Toast.makeText(getApplicationContext(), "view the your price", Toast.LENGTH_LONG).show();
                    return false;
                }
//                if (etphone.getText().toString().equalsIgnoreCase("")) {
//                    Toast.makeText(getApplicationContext(), "Please enter phone number", Toast.LENGTH_LONG).show();
//                    return false;
//                }
                return true;
            }




        });


    }

    public void btnClick(View view) {
        Intent i = new Intent(Intent.ACTION_CALL);
        i.setData(Uri.parse("tel:+94774003562"));

        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
            Toast.makeText(this, "Please grant the permission to call", Toast.LENGTH_SHORT).show();
            requestPermission();


        }
        else {
            startActivity(i);

        }
    }



    private void requestPermission () {
        ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CALL_PHONE}, 1);
    }

}
