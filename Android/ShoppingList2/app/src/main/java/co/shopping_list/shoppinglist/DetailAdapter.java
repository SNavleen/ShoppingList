package co.shopping_list.shoppinglist;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import org.json.JSONObject;

import java.text.NumberFormat;
import java.util.List;

/**
 * Created by Hassaan on 15-09-19.
 */

public class DetailAdapter extends BaseAdapter {

    private List<String> mData;
    private Context mContext;
    private LayoutInflater mInflater;

    public DetailAdapter(List<String> data, Context context) {
        mData = data;
        mContext = context;
        mInflater = LayoutInflater.from(mContext);
    }

    @Override
    public int getCount() {
        return mData.size();
    }

    @Override
    public Object getItem(int position) {
        return mData.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        View view = mInflater.inflate(R.layout.shopping_item_cell, parent, false);

        String jsonString = mData.get(position);
        JSONObject jsonObject;

        try {
            jsonObject = new JSONObject(jsonString);

            ((TextView) view.findViewById(R.id.textView2)).setText(jsonObject.getString("strItemName"));
            ((TextView) view.findViewById(R.id.textView3)).setText(NumberFormat.getCurrencyInstance().format(NumberFormat.getInstance().parse(jsonObject.getString("doublePrice"))));
            ((TextView) view.findViewById(R.id.textView4)).setText(jsonObject.getString("strLocation"));

        }
        catch (Exception e) {

        }

        return view;
    }
}
