package co.shopping_list.shoppinglist;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.List;

/**
 * Created by Hassaan on 15-09-19.
 */

public class ShoppingAdapter extends BaseAdapter {

    private List<String> mData;
    private Context mContext;
    private LayoutInflater mInflater;

    public ShoppingAdapter(List<String> data, Context context) {
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
        View view = mInflater.inflate(R.layout.shopping_item_cell_single, parent, false);
        TextView textView = (TextView) view.findViewById(R.id.singleCell);
        textView.setText(mData.get(position));
        return view;
    }
}
