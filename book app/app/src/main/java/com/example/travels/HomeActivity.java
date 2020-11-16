package com.example.travels;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import java.util.HashMap;

public class HomeActivity extends AppCompatActivity {

    Button register, log_in;
    EditText First_Name, Email, Password,nic,phone ;
    String F_Name_Holder, EmailHolder, PasswordHolder,NicHolder,PhoneHolder;
    String finalResult ;
//    String HttpURL = commonFIle.port + "/UserRegistration.php";
String HttpURL = "http://192.168.8.170/Dilmi/UserRegistration.php";
    Boolean CheckEditText ;
    Boolean CheckFlag ;
    Boolean CheckNic ;
    ProgressDialog progressDialog;
    HashMap<String,String> hashMap = new HashMap<>();
    HttpParse httpParse = new HttpParse();

    String emailPattern = "[a-zA-Z0-9._-]+@[a-z]+\\.+[a-z]+";
    String NICPattern = "^[0-9]{11}[vVxX]$||^[0-9]{9}[vVxX]$";
    //    String phonePattern = "^[0-9{10}]$";
    String namePattern = "^[a-zA-Z]+$";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        //Assign Id'S
        First_Name = (EditText)findViewById(R.id.editTextF_Name);
//        Last_Name = (EditText)findViewById(R.id.editTextL_Name);
        Email = (EditText)findViewById(R.id.editTextEmail);
        Password = (EditText)findViewById(R.id.editTextPassword);
        nic=(EditText)findViewById(R.id.editTextNo);
        phone=(EditText)findViewById(R.id.editTextPh);
        register = (Button)findViewById(R.id.Submit);
        log_in = (Button)findViewById(R.id.Login);

        //Adding Click Listener on button.
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

//                if(Email.getText().toString().isEmpty()) {
//                    Toast.makeText(getApplicationContext(),"enter email address",Toast.LENGTH_SHORT).show();
//                }else {
//                    if (Email.getText().toString().trim().matches(emailPattern)) {
////                        Toast.makeText(getApplicationContext(),"valid email address",Toast.LENGTH_SHORT).show();
//                    } else {
//                        Toast.makeText(getApplicationContext(),"Invalid email address", Toast.LENGTH_SHORT).show();
//                    }
//                }
//
////
//
//
//                if(nic.getText().toString().isEmpty()) {
//                    Toast.makeText(getApplicationContext(),"enter NIC",Toast.LENGTH_SHORT).show();
//                }else {
//                    if (nic.getText().toString().trim().matches(NICPattern)) {
////                        Toast.makeText(getApplicationContext(),"valid email address",Toast.LENGTH_SHORT).show();
//                    } else {
//                        Toast.makeText(getApplicationContext(),"Invalid NIC", Toast.LENGTH_SHORT).show();
//                    }
//                }


                // Checking whether EditText is Empty or Not
                CheckEditTextIsEmptyOrNot();

                if(CheckEditText && CheckFlag && CheckNic){

                    // If EditText is not empty and CheckEditText = True then this block will execute.

                    UserRegisterFunction(F_Name_Holder,EmailHolder, PasswordHolder,NicHolder,PhoneHolder);

                }
                else if(CheckEditText==false) {

                    // If EditText is empty then this block will execute .
                    Toast.makeText(com.example.travels.HomeActivity.this, "Please fill all form fields.", Toast.LENGTH_LONG).show();

                }
                else if(CheckFlag==false) {

                    // If EditText is empty then this block will execute .
                    Toast.makeText(com.example.travels.HomeActivity.this, "Please enter valid email address", Toast.LENGTH_LONG).show();

                }
                else if(CheckNic==false) {

                    // If EditText is empty then this block will execute .
                    Toast.makeText(com.example.travels.HomeActivity.this, "Please enter valid nic", Toast.LENGTH_LONG).show();

                }


            }
        });

        log_in.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(com.example.travels.HomeActivity.this,UserLoginActivity.class);
                startActivity(intent);

            }
        });

    }

    public void CheckEditTextIsEmptyOrNot(){

        F_Name_Holder = First_Name.getText().toString();
//        L_Name_Holder = Last_Name.getText().toString();
        EmailHolder = Email.getText().toString();
        PasswordHolder = Password.getText().toString();
        NicHolder=nic.getText().toString();
        PhoneHolder=phone.getText().toString();

        if(TextUtils.isEmpty(F_Name_Holder)  || TextUtils.isEmpty(EmailHolder) || TextUtils.isEmpty(PasswordHolder) || TextUtils.isEmpty(NicHolder) || TextUtils.isEmpty(PhoneHolder))
        {

            CheckEditText = false;

        }
        else {

            CheckEditText = true ;
        }
        if (Email.getText().toString().trim().matches(emailPattern)){
            CheckFlag=true;

        }
        else{
            CheckFlag=false;
        }
        if (nic.getText().toString().trim().matches(NICPattern)){
            CheckNic=true ;

        }
        else {
            CheckNic=false;
        }

    }

    public void UserRegisterFunction(final String F_Name,  final String email, final String password, final String nic,final String phone){

        class UserRegisterFunctionClass extends AsyncTask<String,Void,String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = ProgressDialog.show(com.example.travels.HomeActivity.this,"Loading Data",null,true,true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {

                super.onPostExecute(httpResponseMsg);

                progressDialog.dismiss();

                Toast.makeText(com.example.travels.HomeActivity.this,httpResponseMsg.toString(), Toast.LENGTH_LONG).show();

            }

            @Override
            protected String doInBackground(String... params) {

                hashMap.put("f_name",params[0]);

//                hashMap.put("L_name",params[1]);

                hashMap.put("email",params[1]);

                hashMap.put("password",params[2]);
                hashMap.put("nic",params[3]);
                hashMap.put("phone",params[4]);

                finalResult = httpParse.postRequest(hashMap, HttpURL);

                return finalResult;
            }
        }

        UserRegisterFunctionClass userRegisterFunctionClass = new UserRegisterFunctionClass();

        userRegisterFunctionClass.execute(F_Name,email,password,nic,phone);
    }

}