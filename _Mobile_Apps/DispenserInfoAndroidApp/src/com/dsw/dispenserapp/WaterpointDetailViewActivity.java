package com.dsw.dispenserapp;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;


public class WaterpointDetailViewActivity  extends Activity {
	
	
	//XML node keys
	private static final String TAG_WPTID = "wptid";
	
	
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.waterpoints_detail_view);
        
        Header header = (Header) findViewById(R.id.header);
		 header.initHeader();
		 
        DbHandler db = new DbHandler(this);
        
      
        
       
        // getting intent data
        Intent in = getIntent();
        
        // Get XML values from previous intent
        final String wptid = in.getStringExtra(TAG_WPTID);
        Waterpoints wpt = db.getWaterpoint(Integer.parseInt(wptid));
        String waterpointname = wpt.getwaterpointName();
        String districtName = wpt.getdistrictName();
        String divisionName = wpt.getdivisionName();
        String locationName = wpt.getlocationName();
        String sublocationName = wpt.getsublocationName();
        String villageName = wpt.getvillageName();
        String directions  = wpt.getDirections();
        String promoterName = wpt.getPromoterName();
        String pcontact1 = wpt.getPromoterContact1();
        String pcontact2 = wpt.getPromoterContact2();
        String assistpromoterName = wpt.getAssistantPromoterName();
        String assistpcontact1 = wpt.getAssistantPromoterContact1();
        String assistpcontact2 = wpt.getAssistantPromoterContact2();
        
        // Displaying all values on the screen       
        TextView lblWaterpointName = (TextView) findViewById(R.id.wpt_details_name);
        TextView lblWaterpointID = (TextView) findViewById(R.id.wpt_details_id);      
        TextView lblDistrictName = (TextView) findViewById(R.id.wpt_details_dist);
        TextView lblDivisionName = (TextView) findViewById(R.id.wpt_details_div);  
        TextView lblLocationName = (TextView) findViewById(R.id.wpt_details_loc);
        TextView lblSubLocationName = (TextView) findViewById(R.id.wpt_details_subloc);  
        TextView lblVillageName = (TextView) findViewById(R.id.wpt_details_village);
        TextView lblDirections = (TextView) findViewById(R.id.wpt_details_directions);
        TextView lblPromoterName = (TextView) findViewById(R.id.wpt_details_pname);  
        TextView lblPromoterContact1 = (TextView) findViewById(R.id.wpt_details_pcontact1);
        TextView lblPromoterContact2 = (TextView) findViewById(R.id.wpt_details_pcontact2);
        TextView lblAssistPromoterName = (TextView) findViewById(R.id.wpt_details_asst_pname);  
        TextView lblAssistPromoterContact1 = (TextView) findViewById(R.id.wpt_details_asst_pcontact1);
        TextView lblAssistPromoterContact2 = (TextView) findViewById(R.id.wpt_details_asst_pcontact2);
      
        lblWaterpointName.setText("Waterpoint Name: \n" +waterpointname);
        lblWaterpointID.setText("Waterpoint Id: \n" +wptid);
        lblDistrictName.setText("District Name: \n"+districtName);
        lblDivisionName.setText("Division Name: \n"+divisionName);
        lblLocationName.setText("Location Name: \n"+locationName);
        lblSubLocationName.setText("Sub-Location Name: \n"+sublocationName);
        lblVillageName.setText("Village Name: \n"+villageName);
        lblDirections.setText("Directions: \n"+directions);
        lblPromoterName.setText("Promoter Name: \n"+promoterName);
        lblPromoterContact1.setText("Promoter Contact 1: \n"+pcontact1);
        lblPromoterContact2.setText("Promoter Contact 2: \n"+pcontact2);
        lblAssistPromoterName.setText("Assistant Promoter Name: \n"+assistpromoterName);
        lblAssistPromoterContact1.setText("Assistant Promoter Contact 1: \n"+assistpcontact1);
        lblAssistPromoterContact2.setText("Assistant Promoter Contact 2: \n"+assistpcontact2);
       
    }
}
