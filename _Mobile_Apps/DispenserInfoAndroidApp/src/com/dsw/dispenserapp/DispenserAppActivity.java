package com.dsw.dispenserapp;


import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class DispenserAppActivity extends Activity {
	
	@Override
	public void onResume() {
		super.onResume();
		  final SyncActivity sy = new SyncActivity();
	       final DbHandler db = new DbHandler(this); 
	     
		
		if(db.getCount(db.TABLE_METADATA) <= 0) //first time login or user cleared db
		{
		   setContentView(R.layout.login);
		   db.deleteFromTable(db.TABLE_USERS);
		  
		   sy.SyncUsers(db); //sync users first
	       Button login = (Button) findViewById(R.id.btnLogin);        
	        // Listening for one time login
	       login .setOnClickListener(new View.OnClickListener() {			
				public void onClick(View v) {
				
				 
					final ProgressDialog progress = ProgressDialog.show(DispenserAppActivity.this, "Logging In",
							  "Checking Credentials!", true);

							new Thread(new Runnable() {
							  @Override
							  public void run()
							  { 
								//do the logging in here
								  
									// Switching to sync screen
									String staffid= ((EditText) findViewById(R.id.txtStaffID)).getText().toString();					
									String password= ((EditText) findViewById(R.id.txtPassword)).getText().toString();
									
									if(db.checkIfFieldExists("userid", staffid.trim(), db.TABLE_USERS)											
											&& 
									db.checkIfFieldExists("password", password.trim(), db.TABLE_USERS))//login successful
									{
										sy.setMetadata(db,staffid);//set metadata for first time										
										Intent i = new Intent(getApplicationContext(), HomeActivity.class);
										startActivity(i);
									}
									
									
									
							    runOnUiThread(new Runnable() {
							      @Override
							      public void run()
							      {
							        progress.dismiss();							       
							        //	Toast.makeText(getApplicationContext(),"Invalid Login, please retry again", Toast.LENGTH_LONG).show();
										
							        
							        
							      }
							    });
							  }
							}).start();
					
				}
			});
		}
		else
		{ 
			
			Intent i = new Intent(getApplicationContext(), HomeActivity.class);
			startActivity(i);
		}
	}

	
	
	
}