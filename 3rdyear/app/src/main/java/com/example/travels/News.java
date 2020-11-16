package com.example.travels;

import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class News extends AppCompatActivity {

//    String urladdress=commonFIle.port + "/php/cando/displayprofile.php";
String urladdress = "http://192.168.8.170/Dilmi/displayprofile.php";
    String[] title;
    String[] descripe;
    String[] imagepath;
    ListView listView;
    BufferedInputStream is;
    String line=null;
    String result=null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_news);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        listView=(ListView)findViewById(R.id.lview);

        StrictMode.setThreadPolicy((new StrictMode.ThreadPolicy.Builder().permitNetwork().build()));
        collectData();
        CustomListview customListView=new CustomListview(this,title,descripe,imagepath);
        listView.setAdapter(customListView);

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
            title=new String[ja.length()];
            descripe=new String[ja.length()];
            imagepath=new String[ja.length()];

            for(int i=0;i<=ja.length();i++){
                jo=ja.getJSONObject(i);
                title[i]=jo.getString("title");
                descripe[i]=jo.getString("descripe");
                imagepath[i]=jo.getString("photo");
            }
        }
        catch (Exception ex)
        {

            ex.printStackTrace();
        }


    }
}
