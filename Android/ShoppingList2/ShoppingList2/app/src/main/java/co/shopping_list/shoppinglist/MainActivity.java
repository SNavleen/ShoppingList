package co.shopping_list.shoppinglist;

import android.app.Activity;
import android.content.Intent;
import android.database.DataSetObserver;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.EditText;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import java.util.ArrayList;
import java.util.List;

import java.net.*;
import java.net.HttpURLConnection;
import java.io.*;


public class MainActivity extends Activity {

    class MyTask extends AsyncTask<Void, Void, Void> {
        @Override
        protected void onPreExecute() {

        }


        @Override
        protected Void doInBackground(Void... params) {
            URL BaseURL = null;
            try {
                BaseURL= new URL("http://gcp-hackthenorth-3212.appspot.com/");
                String charset = "UTF-8";  // Or in Java 7 and later, use the constant: java.nio.charset.StandardCharsets.UTF_8.name()
                String item = "true";
                //String param2 = "value2";

                String query = String.format("?item=%s",
                        //    URLEncoder.encode(param1, charset),
                        URLEncoder.encode(item, charset));

                URLConnection connection = BaseURL.openConnection();
                // connection.setDoOutput(true); // Triggers POST.
                connection.setRequestProperty("Accept-Charset", charset);
                // connection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded;charset=" + charset);

                try (OutputStream output = connection.getOutputStream()) {
                    output.write(query.getBytes(charset));
                }

                InputStream strJsonResponse = connection.getInputStream();

                System.out.print(strJsonResponse);
            }
            catch(IOException e) {

            }
            return null;
        }

        @Override
        protected void onProgressUpdate(Void... values) {

        }

        @Override
        protected void onPostExecute(Void aVoid) {

        }

    }




    final List<String> itemList = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {



        //---------------------------------------------------------------


        //----------------------------------------------------------------

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        final ShoppingAdapter itemAdapter = new ShoppingAdapter(itemList, this);

        findViewById(R.id.button2).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent activityTwo = new Intent(MainActivity.this, SecondActivity.class);
                startActivity(activityTwo);
            }
        });
        final EditText userEnter = (EditText) findViewById(R.id.editText);
        findViewById(R.id.button).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String text = userEnter.getText().toString();
                itemList.add(text);
                itemAdapter.notifyDataSetChanged();
            }
        });

        ListView itemListView = (ListView) findViewById(R.id.listView);
        itemListView.setAdapter(itemAdapter);
        itemListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String itemThatWasClicked = itemList.get(position);
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
