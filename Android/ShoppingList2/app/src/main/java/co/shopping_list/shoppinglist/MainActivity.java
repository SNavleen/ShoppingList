package co.shopping_list.shoppinglist;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.EditText;
import android.widget.ListView;


import com.google.gson.Gson;
import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;
import com.loopj.android.http.RequestParams;

import java.util.ArrayList;
import java.util.List;

import cz.msebera.android.httpclient.Header;


public class MainActivity extends Activity {
    private final String TAG = "MainActivity";


    private final List<String> itemList = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {



        //---------------------------------------------------------------


        //----------------------------------------------------------------

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        final ShoppingAdapter itemAdapter = new ShoppingAdapter(itemList, this);

        AutoCompleteTextView autoCompleteTextView = (AutoCompleteTextView)findViewById(R.id.autoCompleteTextView);

        final ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1);


        new GetGroceriesTask(adapter).execute((Void[]) null);

        autoCompleteTextView.setAdapter(adapter);

        findViewById(R.id.button2).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String url = "http://gcp-hackthenorth-3212.appspot.com";

                Gson gson = new Gson();
                String json = gson.toJson(itemList);
                // Add post variables here
                RequestParams params = new RequestParams();
                params.add("list", json);

                AsyncHttpClient client = new AsyncHttpClient();
                client.post(url, params, new AsyncHttpResponseHandler() {
                    @Override
                    public void onSuccess(int statusCode, Header[] headers, byte[] responseBody) {

                        String s = "";

                        try {
                            s = new String(responseBody, "US-ASCII");
                        }
                        catch (Exception e) {

                        }

                        Log.d("Test", "Response body " + s);
                        Intent activityTwo = new Intent(MainActivity.this, SecondActivity.class);
                        activityTwo.putExtra("data", s);

                        startActivity(activityTwo);
                    }

                    @Override
                    public void onFailure(int statusCode, Header[] headers, byte[] responseBody, Throwable error) {

                    }
                });

            }
        });
        final EditText userEnter = (EditText) findViewById(R.id.autoCompleteTextView);
        findViewById(R.id.button).setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                String text = userEnter.getText().toString();
                itemList.add(text);
                itemAdapter.notifyDataSetChanged();
                userEnter.setText(null);
            }
        });


        ListView itemListView = (ListView) findViewById(R.id.listView);
        itemListView.setAdapter(itemAdapter);
        itemListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String itemThatWasClicked = itemList.get(position);
                    /*String url = "http://gcp-hackthenorth-3212.appspot.com";

                    Gson gson = new Gson();
                    String json = gson.toJson(itemList);

                    // Add post variables here
                    RequestParams params = new RequestParams();
                    params.add("list", json);

                    AsyncHttpClient client = new AsyncHttpClient();
                    client.post(url, params, new AsyncHttpResponseHandler() {
                        @Override
                        public void onSuccess(int statusCode, Header[] headers, byte[] responseBody) {
                            new GetFinalListTask(adapter).execute((Void[]) null);
                        }

                        @Override
                        public void onFailure(int statusCode, Header[] headers, byte[] responseBody, Throwable error) {

                        }
                    });

                    Intent activityTwo = new Intent(MainActivity.this, SecondActivity.class);
                    startActivity(activityTwo);*/
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
