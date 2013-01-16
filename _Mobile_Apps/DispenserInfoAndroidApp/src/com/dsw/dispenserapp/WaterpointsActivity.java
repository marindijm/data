package com.dsw.dispenserapp;


import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListView;




public class WaterpointsActivity extends Activity {
	
	static final String KEY_WATERPOINTID = "waterpoint_id";
	private static final String TAG_WATERPOINTID = "wptid";
	  // Search EditText
    EditText inputSearch;
 
	
	ListView list;
    LazyAdapter adapter;

	@Override
	public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
		setContentView(R.layout.waterpoints);		
		 Header header = (Header) findViewById(R.id.header);
		 header.initHeader();
		 
		 


		DbHandler db = new DbHandler(this);
		ArrayList<HashMap<String, String>> waterpointsList = new ArrayList<HashMap<String, String>>();

		 // Reading all contacts
        Log.d("Reading: ", "Reading all issues..");
        List<Waterpoints> waterpoint = db.getAllWaterpointIDS();
		// looping through all issue nodes <issue>
        for (Waterpoints wpt : waterpoint) {
			// creating new HashMap
			HashMap<String, String> map = new HashMap<String, String>();			
			
			// adding each child node to HashMap key => value
			map.put(KEY_WATERPOINTID,String.valueOf(wpt.getwaterpointID()));		
	
		
			// adding HashList to ArrayList
			waterpointsList.add(map);		
		        
        }	
        
        inputSearch = (EditText) findViewById(R.id.inputSearch);
		list=(ListView)findViewById(R.id.wpts_list);		
		// Getting adapter by passing xml data ArrayList
        adapter=new LazyAdapter(this, waterpointsList,"wpts");        
        list.setAdapter(adapter);       

        

        /**
         * Enabling Search Filter
         * */
        inputSearch.addTextChangedListener(new TextWatcher() {
 
            @Override
            public void onTextChanged(CharSequence cs, int arg1, int arg2, int arg3) {
                // When user changed the Text
                WaterpointsActivity.this.adapter.getFilter().filter(cs);
            }
 
            @Override
            public void beforeTextChanged(CharSequence arg0, int arg1, int arg2,
                    int arg3) {
                // TODO Auto-generated method stub
 
            }
 
            @Override
            public void afterTextChanged(Editable arg0) {
                // TODO Auto-generated method stub
            }
        });
        // Click event for single list row
        list.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
				// getting values from selected ListItem
				String wptid= ((TextView) view.findViewById(R.id.waterpoint_id_item)).getText().toString();			
				
					// Start the waterpoints detail
					Intent in = new Intent(getApplicationContext(), WaterpointDetailViewActivity.class);
					in.putExtra(TAG_WATERPOINTID,  wptid);	
					startActivity(in);
				
	
			
			}
		});
       
   
	}	
}