package com.dsw.dispenserapp;


import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import com.dsw.dispenserapp.R;

import android.app.Activity;
import android.content.Intent;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.TextView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListView;




public class IssuesListActivity extends Activity {
	
	// XML node keys
	static final String KEY_ISSUE = "issue"; // parent node
	static final String KEY_ISSUEID = "issueid";
	static final String KEY_ISSUETYPE = "issuetype";
	static final String KEY_WATERPOINTNAME= "waterpoint_name";
	static final String KEY_WATERPOINTID = "waterpointid";
	static final String KEY_DATECREATED = "date_time_created";
		static String user_assigned =""; //will only be assigned once
	
	
		private static final String TAG_ISSUEID = "issueid";
		
	ListView list;
    LazyAdapter adapter;

	@Override
	public void onResume() {
		super.onResume();
		setContentView(R.layout.issues);
		 Header header = (Header) findViewById(R.id.header);
		 header.initHeader();
		 
		
		DbHandler db = new DbHandler(this);
		ArrayList<HashMap<String, String>> issuesList = new ArrayList<HashMap<String, String>>();

		 // Reading all issues
        Log.d("Reading: ", "Reading all issues..");
        List<Issues> issue = db.getAllIssues();  
		// looping through all issue nodes <issue>
        for (Issues is : issue) {
        	
        	if(is.getIssueStatus().trim().equalsIgnoreCase("f"))//only load issues not resolved
        	{
				// creating new HashMap
				HashMap<String, String> map = new HashMap<String, String>();			
				
				// adding each child node to HashMap key => value
				map.put(KEY_ISSUEID,String.valueOf(is.getissueID()));
				map.put(KEY_ISSUETYPE, is.getIssueType());
				map.put(KEY_WATERPOINTNAME, is.getwaterpointName());
				map.put(KEY_WATERPOINTID,String.valueOf(is.getwaterpointID()));		
				map.put(KEY_DATECREATED,is.getDateCreated());
		
				user_assigned  = is.getUserAssigned();
				// adding HashList to ArrayList
				issuesList.add(map);
        	}
		        
        }	
		
		
		 TextView assigned_for = (TextView)findViewById(R.id.assigned_for); // assign the name first	
		 assigned_for.setText("Assigned Issues For: " + user_assigned);
		 
		
	

		list=(ListView)findViewById(R.id.issues_list);
		
		// Getting adapter by passing xml data ArrayList
        adapter=new LazyAdapter(this, issuesList,"issues");        
        list.setAdapter(adapter);
        

        // Click event for single list row
        list.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
							
				// getting values from selected ListItem
				String issueid= ((TextView) view.findViewById(R.id.issue_id)).getText().toString();
				
			  //Toast.makeText(getApplicationContext(),assigned_for_value, Toast.LENGTH_LONG).show();
				
				// Starting new intent
				Intent in = new Intent(getApplicationContext(), SingleDispenserIssueActivity.class);
				in.putExtra(TAG_ISSUEID, issueid);				
				
				startActivity(in);
			}
		});		
	}	
}