package com.dsw.dispenserapp;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Filter;
import android.widget.Filterable;
import android.widget.ImageView;
import android.widget.TextView;

public class LazyAdapter extends BaseAdapter implements Filterable{

    
    private Activity activity;
    private ArrayList<HashMap<String, String>> data;
    private static LayoutInflater inflater=null;
    private String which_list = "";
    List<String> arrayList;      
    List<String> mOriginalValues; // Original Values
    
    public LazyAdapter(Activity a, ArrayList<HashMap<String, String>> d, String list) {
        activity = a;
        data=d;
        which_list=list;
        inflater = (LayoutInflater)activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
       
    }

    public int getCount() {
        return data.size();
    }

    public Object getItem(int position) {
        return position;
    }

    public long getItemId(int position) {
        return position;
    }
    
    public View getView(int position, View convertView, ViewGroup parent) {
        View vi=convertView;
        
        if(which_list == "issues")//inflate issues list
        {
        	 if(convertView==null)
                 vi = inflater.inflate(R.layout.issues_list_row, null);
             
            
             TextView issueid = (TextView)vi.findViewById(R.id.issue_id); // the issue id
             TextView issuetype = (TextView)vi.findViewById(R.id.issue_type); // the issue type
             TextView waterpointname = (TextView)vi.findViewById(R.id.waterpoint_name); // the waterpoint name
             TextView waterpointid = (TextView)vi.findViewById(R.id.waterpoint_id); // the waterpoint id       
           
             
             HashMap<String, String> issues = new HashMap<String, String>();
             issues = data.get(position);
             
           // 
             issueid.setText(issues.get(IssuesListActivity.KEY_ISSUEID ));
             issuetype.setText(issues.get(IssuesListActivity.KEY_ISSUETYPE ));
             waterpointname.setText(issues.get(IssuesListActivity.KEY_WATERPOINTNAME));
             waterpointid.setText(issues.get(IssuesListActivity.KEY_WATERPOINTID));
             //   imageLoader.DisplayImage(issues.get(IssueTrackerDisplayActivity.KEY_THUMB_URL), thumb_image);
        }
        if(which_list == "home_list")//inflate issues list
        {
        	 if(convertView==null)
                 vi = inflater.inflate(R.layout.home_list_row, null);//inflate homepage items
             
            
             TextView list_item = (TextView)vi.findViewById(R.id.home_list_item); // the list item      
             ImageView img = (ImageView)vi.findViewById(R.id.home_list_item_icon);
            
             
             HashMap<String, String> home_list_items = new HashMap<String, String>();
             home_list_items = data.get(position);          
           
             list_item.setText(home_list_items.get(HomeActivity.KEY_LIST_ITEM ));
             if(position == 0)
             {
                img.setImageResource(R.drawable.tracker);
             }
             else if(position == 1)
             {
                img.setImageResource(R.drawable.waterpoint);
             }
             else if(position == 2)
             {
                img.setImageResource(R.drawable.route);
             }
             else
             {
            	 img.setImageResource(R.drawable.route);
             }
            
             
        }
        if(which_list == "wpts")//inflate issues list
        {
        	 if(convertView==null)
                 vi = inflater.inflate(R.layout.waterpoints_list_row, null);//inflate waterpoint items
             
            
             TextView list_item = (TextView)vi.findViewById(R.id.waterpoint_id_item); // the list item      
            
             
             HashMap<String, String> wpt_list_items = new HashMap<String, String>();
             wpt_list_items = data.get(position);          
           
             list_item.setText(wpt_list_items.get(WaterpointsActivity.KEY_WATERPOINTID ));
             
            
             
        }
   
        return vi;
    }
    @Override
    public Filter getFilter() {
        Filter filter = new Filter() {

            @SuppressWarnings("unchecked")
            @Override
            protected void publishResults(CharSequence constraint,FilterResults results) {

                arrayList = (List<String>) results.values; // has the filtered values
                notifyDataSetChanged();  // notifies the data with new filtered values
            }

            @Override
            protected FilterResults performFiltering(CharSequence constraint) {
                FilterResults results = new FilterResults();        // Holds the results of a filtering operation in values
                List<String> FilteredArrList = new ArrayList<String>();

                if (mOriginalValues == null) {
                    mOriginalValues = new ArrayList<String>(arrayList); // saves the original data in mOriginalValues
                }

                /********
                 * 
                 *  If constraint(CharSequence that is received) is null returns the mOriginalValues(Original) values
                 *  else does the Filtering and returns FilteredArrList(Filtered)  
                 *
                 ********/
                if (constraint == null || constraint.length() == 0) {

                    // set the Original result to return  
                    results.count = mOriginalValues.size();
                    results.values = mOriginalValues;
                } else {
                    constraint = constraint.toString().toLowerCase();
                    for (int i = 0; i < mOriginalValues.size(); i++) {
                        String data = mOriginalValues.get(i);
                        if (data.toLowerCase().startsWith(constraint.toString())) {
                            FilteredArrList.add(data);
                        }
                    }
                    // set the Filtered result to return
                    results.count = FilteredArrList.size();
                    results.values = FilteredArrList;
                }
                return results;
            }
        };
        return filter;
    }	
}