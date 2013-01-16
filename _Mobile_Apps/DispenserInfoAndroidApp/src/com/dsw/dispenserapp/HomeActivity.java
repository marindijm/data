package com.dsw.dispenserapp;


import java.util.ArrayList;
import java.util.HashMap;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.view.View;
import android.view.Window;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListView;




public class HomeActivity extends Activity {
	
	static final String KEY_LIST_ITEM = "item";	
	
	String home_list_items [] = {"Issue Tracker","Waterpoints","Chlorine Delivery Routes"};
	
	ListView list;
    LazyAdapter adapter;
    // Connection detector
    ConnectionDetector cd;
 
    // Alert dialog manager
    AlertDialogManager alert = new AlertDialogManager();
	@Override
	public void onResume() {
		super.onResume();
		// requestWindowFeature(Window.FEATURE_NO_TITLE);
		setContentView(R.layout.home);	
		 Header header = (Header) findViewById(R.id.header);
		 header.initHeader();
		 
		 
	    
		ArrayList<HashMap<String, String>> homepageList = new ArrayList<HashMap<String, String>>();	
     
        for (int i= 0; i < home_list_items.length; i ++ ) {
			// creating new HashMap
			HashMap<String, String> map = new HashMap<String,String>();			
			
			// adding each child node to HashMap key => value
			map.put(KEY_LIST_ITEM,home_list_items[i]);
			
			// adding HashList to ArrayList
			homepageList.add(map);		
		        
        }
	
		list=(ListView)findViewById(R.id.home_list);		
		// Getting adapter by passing xml data ArrayList
        adapter=new LazyAdapter(this, homepageList,"home_list");        
        list.setAdapter(adapter);    
        
        
       
        // Click event for single list row
        list.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
				// getting values from selected ListItem
				String list_item = ((TextView) view.findViewById(R.id.home_list_item)).getText().toString();
				
				if(list_item =="Issue Tracker")
				{
					// Start issue tracker
					Intent i = new Intent(getApplicationContext(), IssuesListActivity.class);
					startActivity(i);
				}
				if(list_item =="Waterpoints")
				{
					// Start issue tracker
					Intent i = new Intent(getApplicationContext(), WaterpointsActivity.class);
					startActivity(i);
				}
			
			}
		});
        RelativeLayout sync = (RelativeLayout) findViewById(R.id.btnSyncAll);  
        final SyncActivity sy = new SyncActivity();
        final DbHandler db = new DbHandler(this); 
        // sync all the items
         sync .setOnClickListener(new View.OnClickListener() {			
			public void onClick(View v) {			
				 cd = new ConnectionDetector(getApplicationContext());
				 
			        // Check for internet connection
			        if (!cd.isConnectingToInternet()) {
			            // Internet Connection is not present
			            alert.showAlertDialog(HomeActivity.this, "Internet Connection Error",
			                    "Please check if you're connected to the internet and its working well!", false);
			            // stop executing code by return
			            return;
			        }
			 
					final ProgressDialog progress = ProgressDialog.show(HomeActivity.this, "Synchronizing",
							  "Syncing dispenser info!", true);

							new Thread(new Runnable() {
							  @Override
							  public void run()
							  { 
								//do the syncing here	
								  Metadata md = db.getMetadata();
								  
								  //sync issues first
							      sy.SyncIssues(db,md.getUserId());
							      
							      
							      //then waterpoints
								  int local_wpt_count = db.getCount(db.TABLE_WATERPOINTS);
								  
								  int server_wpt_count = md.getwptsCount();
								  if(local_wpt_count != server_wpt_count)
								  {
									  db.deleteFromTable(db.TABLE_WATERPOINTS);
									  sy.SyncWaterpoints(db);
								  }
								  
								  //then users
								  int local_user_count = db.getCount(db.TABLE_USERS);								
								  int server_user_count = md.getUsersCount();
								  if(local_user_count != server_user_count)
								  {
									  db.deleteFromTable(db.TABLE_USERS);
									  sy.SyncUsers(db);
								  }
								//update metadata
							      sy.updateMetadata(db);
							    runOnUiThread(new Runnable() {
							      @Override
							      public void run()
							      {
							        progress.dismiss();
							      }
							    });
							  }
							}).start();
					
			}
	});
   
	}	
}