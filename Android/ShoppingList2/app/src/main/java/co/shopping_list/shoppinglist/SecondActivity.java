package co.shopping_list.shoppinglist;

import android.app.Activity;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import org.json.JSONArray;

import java.util.ArrayList;
import java.util.List;


public class SecondActivity extends Activity {

    private final List<String> itemList2 = new ArrayList<>();


    private Handler mHandler = new Handler();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_two);


        Log.d("this", this.toString());






        final ArrayAdapter<String> adapter2 = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1);

        //new GetLocationAndPricesTask(adapter2).execute((Void[]) null);


        String data = getIntent().getStringExtra("data");

        Log.d("SecondActivity", "Data is " + data);

        JSONArray dataArray = new JSONArray();

        try {
             dataArray = new JSONArray(data);
            for (int i = 0; i < dataArray.length(); i++) {
                itemList2.add(dataArray.get(i).toString());
            }
        }
        catch (Exception e) {
            Log.d("SecondActivity", "Unable to parse array." + e.toString());
        }

        final DetailAdapter itemAdapter2 = new DetailAdapter(itemList2,this);



        /*


        for(int i=1;i < adapter2.getCount() - 1;i++){

            Log.d("Second adapter", "Test" + adapter2.getItem(i));

            System.out.println("Test" + adapter2.getItem(i));
            itemList2.add(adapter2.getItem(i));

        }
        itemAdapter2.notifyDataSetChanged();
*/
        /*

        runOnUiThread(new Runnable() {
            @Override
            public void run() {
                for(int i=0;i < adapter2.getCount();i++){

                    Log.d("Second adapter", "Test" + adapter2.getItem(i));

                    System.out.println("Test" + adapter2.getItem(i));
                    itemList2.add(adapter2.getItem(i));

                }
                itemAdapter2.notifyDataSetChanged();
            }
        });
*/
// delay method

        ListView itemListView = (ListView) findViewById(R.id.listView2);
        itemListView.setAdapter(itemAdapter2);

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
