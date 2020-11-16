package com.example.travels;

import android.app.Activity;
import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.io.InputStream;

/**
 * Created by jaiso on 13-02-2018.
 */

public class CustomListview1 extends ArrayAdapter<String>{

    private String[] busno;
    private String[] noseats;
    private String[] bustype;
    private String[] from;
    private String[] destination;
    private String[] start;
    private String[] end;
    private String[] amount;
    private String[] imagepath;
    private Activity context;
    Bitmap bitmap;

    public CustomListview1(Activity context, String[] busno, String[] noseats,String[] bustype,String[] from,String[] destination,String[] start,String[] end,String[] amount, String[] imagepath) {
        super(context, R.layout.layout2,busno);
        this.context=context;
        this.busno=busno;
        this.noseats=noseats;
        this.bustype=bustype;
        this.from=from;
        this.destination=destination;
        this.start=start;
        this.end=end;
        this.amount=amount;
        this.imagepath=imagepath;
    }


    @NonNull
    @Override

    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent){
        View r=convertView;
        ViewHolder viewHolder=null;
        if(r==null){
            LayoutInflater layoutInflater=context.getLayoutInflater();
            r=layoutInflater.inflate(R.layout.layout2,null,true);
            viewHolder=new ViewHolder(r);
            r.setTag(viewHolder);
        }
        else {
            viewHolder=(ViewHolder)r.getTag();

        }

        viewHolder.tvw1.setText(busno[position]);
        viewHolder.tvw2.setText(noseats[position]);
        viewHolder.tvw3.setText(bustype[position]);
        viewHolder.tvw4.setText(from[position]);
        viewHolder.tvw5.setText(destination[position]);
        viewHolder.tvw6.setText(start[position]);
        viewHolder.tvw7.setText(end[position]);
        viewHolder.tvw8.setText(amount[position]);
        new GetImageFromURL(viewHolder.ivw).execute(imagepath[position]);

        return r;
    }

    class ViewHolder{

        TextView tvw1;
        TextView tvw2;
        TextView tvw3;
        TextView tvw4;
        TextView tvw5;
        TextView tvw6;
        TextView tvw7;
        TextView tvw8;
        ImageView ivw;

        ViewHolder(View v){
            tvw1=(TextView)v.findViewById(R.id.busno);
            tvw2=(TextView)v.findViewById(R.id.noseat);
            tvw2=(TextView)v.findViewById(R.id.type);
            tvw2=(TextView)v.findViewById(R.id.from);
            tvw2=(TextView)v.findViewById(R.id.destination);
            tvw2=(TextView)v.findViewById(R.id.start);
            tvw2=(TextView)v.findViewById(R.id.end);
            tvw2=(TextView)v.findViewById(R.id.amount);

            ivw=(ImageView)v.findViewById(R.id.imageView);
        }

    }

    public class GetImageFromURL extends AsyncTask<String,Void,Bitmap>
    {

        ImageView imgView;
        public GetImageFromURL(ImageView imgv)
        {
            this.imgView=imgv;
        }
        @Override
        protected Bitmap doInBackground(String... url) {
            String urldisplay=url[0];
            bitmap=null;

            try{

                InputStream ist=new java.net.URL(urldisplay).openStream();
                bitmap= BitmapFactory.decodeStream(ist);
            }
            catch (Exception ex)
            {
                ex.printStackTrace();
            }

            return bitmap;
        }

        @Override
        protected void onPostExecute(Bitmap bitmap){

            super.onPostExecute(bitmap);
            imgView.setImageBitmap(bitmap);
        }
    }



}
