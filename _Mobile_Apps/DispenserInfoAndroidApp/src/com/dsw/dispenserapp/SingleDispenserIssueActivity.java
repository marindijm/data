package com.dsw.dispenserapp;


import java.text.SimpleDateFormat;
import java.util.Date;

import com.dsw.dispenserapp.R;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class SingleDispenserIssueActivity  extends Activity {
	
	
	//XML node keys
	private static final String TAG_ISSUEID = "issueid";
	
	
	
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.issues_list_item);
        
        
        final DbHandler db = new DbHandler(this); 
        SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
        final String currentDateandTime = sdf.format(new Date());
        
       
        // getting intent data
        Intent in = getIntent();
        
        // Get XML values from previous intent
        final String issueid = in.getStringExtra(TAG_ISSUEID);
        Issues is = db.getIssue(Integer.parseInt(issueid));
        String waterpointname = is.getwaterpointName();
        String waterpointid = String.valueOf(is.getwaterpointID());
        String issuetype = is.getIssueType();
        String datecreated = is.getDateCreated();
        String comments = is.getComments();
        
        // Displaying all values on the screen
        TextView lblIssueID = (TextView) findViewById(R.id.i_id);
        TextView lblWaterpointName = (TextView) findViewById(R.id.wpt_name);
        TextView lblWaterpointID = (TextView) findViewById(R.id.wpt_id);
        TextView lblIssueType = (TextView) findViewById(R.id.is);
        TextView lblDateCreated = (TextView) findViewById(R.id.d_created);
        final EditText txtComments = (EditText) findViewById(R.id.txtComments);
        
       
        
        lblIssueID.setText("ISSUE ID: " +issueid);
        lblWaterpointName.setText("WATERPOINT NAME: " +waterpointname);
        lblWaterpointID.setText("WATERPOINT ID: " +waterpointid);
        lblIssueType.setText("ISSUE : " +issuetype);
        lblDateCreated.setText("DATE CREATED: " +datecreated);
        txtComments.setText(comments);
       
        Button resolved = (Button) findViewById(R.id.btnMarkAsResolved);        
        // Listening for one time login
       resolved.setOnClickListener(new View.OnClickListener() {			
			public void onClick(View v) {
				db.updateIssue(new Issues(
						Integer.parseInt(issueid),
						"true",
						currentDateandTime,
						txtComments.getText().toString()));
				Toast.makeText(getApplicationContext(),"Issue has been marked as resolved ", 
						Toast.LENGTH_LONG).show();
				// Switching to sync screen
				Intent i = new Intent(getApplicationContext(), IssuesListActivity.class);
				startActivity(i);
			}
		});
    }
}
