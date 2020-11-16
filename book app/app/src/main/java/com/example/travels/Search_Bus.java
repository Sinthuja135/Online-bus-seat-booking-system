package com.example.travels;

import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ListAdapter;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class Search_Bus extends AppCompatActivity {

//    String urladdress= commonFIle.port +  "php/detail/search.php";
        String urladdress = "http://192.168.8.170/Dilmi/search.php";
    String[] bus_no;
    String[] no_of_seats;
    String[] bus_type;
    String[] from_station;
    String[] destination_station;
    String[] start_time;
    String[] end_time;
    String[] amount;

    String[] imagepath;
    ListView listView;
    BufferedInputStream is;
    String line=null;
    String result=null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.layout2);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        listView=(ListView)findViewById(R.id.lview);

        StrictMode.setThreadPolicy((new StrictMode.ThreadPolicy.Builder().permitNetwork().build()));
        collectData();
        CustomListview1 customListview1=new CustomListview1(this,bus_no,no_of_seats,bus_type,from_station,destination_station,start_time,end_time,amount,imagepath);
        listView.setAdapter((ListAdapter) customListview1);

    }


    private void collectData()
    {
//Connection
        try{

            URL url=new URL(urladdress);
            HttpURLConnection con=(HttpURLConnection)url.openConnection();
            con.setRequestMethod("GET");
            is=new BufferedInputStream(con.getInputStream());

        }
        catch (Exception ex)
        {
            ex.printStackTrace();
        }
        //content
        try{
            BufferedReader br=new BufferedReader(new InputStreamReader(is));
            StringBuilder sb=new StringBuilder();
            while ((line=br.readLine())!=null){
                sb.append(line+"\n");
            }
            is.close();
            result=sb.toString();

        }
        catch (Exception ex)
        {
            ex.printStackTrace();

        }

//JSON
        try{
            JSONArray ja=new JSONArray(result);
            JSONObject jo=null;
            bus_no=new String[ja.length()];
            no_of_seats=new String[ja.length()];
            bus_type=new String[ja.length()];
            from_station=new String[ja.length()];
            destination_station=new String[ja.length()];
            start_time=new String[ja.length()];
            end_time=new String[ja.length()];
            amount=new String[ja.length()];
            imagepath=new String[ja.length()];

            for(int i=0;i<=ja.length();i++){
                jo=ja.getJSONObject(i);
                bus_no[i]=jo.getString("bus_no");
                no_of_seats[i]=jo.getString("no_of_seats");
                bus_type[i]=jo.getString("bus_type");
                from_station[i]=jo.getString("from_station");
                destination_station[i]=jo.getString("destination_station");
                start_time[i]=jo.getString("start_time");
                end_time[i]=jo.getString("end_time");
                amount[i]=jo.getString("amount");
                imagepath[i]=jo.getString("photo");
            }
        }
        catch (Exception ex)
        {

            ex.printStackTrace();
        }


    }
}
