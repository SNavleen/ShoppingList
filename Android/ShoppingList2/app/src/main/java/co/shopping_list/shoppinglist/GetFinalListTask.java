package co.shopping_list.shoppinglist;

import android.os.AsyncTask;
import android.util.Log;
import android.widget.ArrayAdapter;

import com.google.gson.Gson;

import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.net.URLConnection;
import java.util.Scanner;

/**
 * Created by Hassaan on 15-09-20.
 */
class GetFinalListTask extends AsyncTask<Void, Void, String[]> {
    private final String TAG = "GetFinalListTask";

    ArrayAdapter<String> mAdapter;

    public GetFinalListTask(ArrayAdapter<String> adapter) {
        mAdapter = adapter;
    }

    @Override
    protected String[] doInBackground(Void... params) {
        URL BaseURL = null;
        String json = null;
        try {
            BaseURL = new URL("http://gcp-hackthenorth-3212.appspot.com/?finallist=true");
            URLConnection connection = BaseURL.openConnection();

            InputStream strJsonResponse = connection.getInputStream();
            Scanner scanner = new Scanner(strJsonResponse).useDelimiter("\\A");

            json = scanner.next();
        } catch (IOException e) {
            e.printStackTrace();
        }

        String[] groceries = new String[0];
        Gson gson = new Gson();
        if (json != null) {
            groceries = gson.fromJson(json, String[].class);
        }
        return groceries;
    }

    @Override
    protected void onPostExecute(String[] strings) {
        mAdapter.clear();
        mAdapter.addAll(strings);
    }

}
