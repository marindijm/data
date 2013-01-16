package com.dsw.dispenserapp;


import android.app.Activity;
import android.os.Bundle;
import android.util.Log;
import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

public class SyncActivity  extends Activity {
	static final String _issues_URL = "http://data.safe-water.org/rest/issues/getissuesassigned/";
	static final String _users_URL = "http://data.safe-water.org/rest/users/getusers/xml";
	static final String _waterpoints_URL = "http://data.safe-water.org/rest/waterpoints/getwaterpoints/xml";
	
	static final String _users_count_URL = "http://data.safe-water.org/rest/count/gettablecount/users/xml";
	static final String _waterpoints_count_URL = "http://data.safe-water.org/rest/count/gettablecount/waterpoints/xml";
	// XML node keys
	//issues
		static final String KEY_ISSUE = "issue"; // parent node
		static final String KEY_ISSUEID = "issueid";
		static final String KEY_WATERPOINT_ID = "waterpointid";
		static final String KEY_WATERPOINT_NAME= "waterpoint_name";	
		static final String KEY_DATECREATED = "date_created";
		static final String KEY_STATUS= "status";
		static final String KEY_USER_ASSIGNED= "user_assigned";
		static final String KEY_ISSUETYPE = "issuetype";
		static final String KEY_DATE_RESOLVED= "date_resolved";
		static final String KEY_COMMENTS= "user_comments";
		//users
		static final String KEY_USER = "user";
		 static final String KEY_USER_ID = "user_id";
		 static final String KEY_USERNAME = "username";
		 static final String KEY_PASSWORD = "password";
		 static final String KEY_EMAIL = "email";
		 static final String KEY_LOGGEDIN = "loggedin";
		
		//waterpoints	
		 static final String KEY_WATERPOINT = "waterpoint";
		 static final String KEY_WATERPOINTID = "waterpoint_id";
		 static final String KEY_WATERPOINTNAME = "waterpoint_name";
		 static final String KEY_DISTRICT_NAME = "district_name";
		 static final String KEY_DIVISION_NAME= "division_name";
		 static final String KEY_LOCATION_NAME = "location_name";
		 static final String KEY_SUBLOCATION_NAME = "sublocation";
		 static final String KEY_VILLAGE_NAME= "village";
		 static final String KEY_DIRECTIONS = "directions";
		 static final String KEY_PROMOTER_NAME = "promoter";
		 static final String KEY_PROMOTER_CONTACT1 = "promoter_contact1";
		 static final String KEY_PROMOTER_CONTACT2 = "promoter_contact2";
		 static final String KEY_ASSISTANT_PROMOTER_NAME = "assistant_promoter";
		 static final String KEY_ASSISTANT_PROMOTER_CONTACT1 = "assistant_promoter_contact1";
		 static final String KEY_ASSISTANT_PROMOTER_CONTACT2 = "assistant_promoter_contact2";	    
		
	@Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    
       
    }
	protected void SyncIssues(DbHandler db, int userid)
	{		
		if(db.getCount(db.TABLE_ISSUES) > 0) //only post if their are issues synced
		{
		   List<Issues> issue = db.getAllIssues(); 
		   Metadata md = db.getMetadata();
			// looping through all issue nodes <issue>
	        for (Issues is : issue) {
	        	
				// post issues marked as resolved
	        	if(is.getIssueStatus().trim().equalsIgnoreCase("true"))
	        	{
	        		postData(String.valueOf(is.getissueID()), is.getComments(), is.getDateResolved(), String.valueOf(md.getUserId()));
	        		 Log.d("Posting to server: ", "solved issue" );
	        	}
	        	
			        
	        }
		}
			
		   XMLParser parser = new XMLParser();
		  	InputStream xml = parser.getXmlFromUrl( _issues_URL + String.valueOf(userid) +"/xml"); // getting XML from URL
			DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
			DocumentBuilder builder = null;
			try {
				 builder = factory.newDocumentBuilder();
			} catch (ParserConfigurationException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			Document doc = null;
			try {
				doc = builder.parse(xml);
			} catch (SAXException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}// getting DOM element
			
			NodeList nl = doc.getElementsByTagName(KEY_ISSUE);		 
			   
			
			// looping through all issue nodes <issue>
			for (int i = 0; i < nl.getLength(); i++) {
				Element e = (Element) nl.item(i);
				if(!db.checkIfFieldExists(db.KEY_ISSUE_ID, parser.getValue(e, KEY_ISSUEID).trim(), db.TABLE_ISSUES)){
			
					 db.addIssue(new Issues(Integer.parseInt(parser.getValue(e, KEY_ISSUEID)),
				    		 Integer.parseInt(parser.getValue(e, KEY_WATERPOINT_ID)),
				    		 parser.getValue(e, KEY_WATERPOINT_NAME),
				    		 parser.getValue(e,  KEY_DATECREATED ),
				    		 parser.getValue(e, KEY_STATUS),
				    		 parser.getValue(e, KEY_USER_ASSIGNED),
				    		 parser.getValue(e, KEY_ISSUETYPE),
				    		 parser.getValue(e, KEY_DATE_RESOLVED),
				    		 parser.getValue(e, KEY_COMMENTS)
					 ));			
					   Log.d("Insert: ", "Inserting Issues To Issues Table..");
				}				
					
			} 
			 
	}
	protected void SyncUsers(DbHandler db)
	{		
		   XMLParser parser = new XMLParser();		   
			InputStream xml = parser.getXmlFromUrl(_users_URL); // getting XML from URL
			DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
			DocumentBuilder builder = null;
			try {
				 builder = factory.newDocumentBuilder();
			} catch (ParserConfigurationException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			Document doc = null;
			try {
				doc = builder.parse(xml);
			} catch (SAXException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}// getting DOM element
			
			NodeList nl = doc.getElementsByTagName(KEY_USER);
			// looping through all issue nodes <issue>
			for (int i = 0; i < nl.getLength(); i++) {
				Element e = (Element) nl.item(i);
			     db.addUser(new Users(Integer.parseInt(parser.getValue(e, KEY_USER_ID)),			    		
			    		 parser.getValue(e, KEY_USERNAME),
			    		 parser.getValue(e,  KEY_PASSWORD ),
			    		 parser.getValue(e, KEY_EMAIL)			    		
			    		
			    		 ));

			
			     Log.d("Insert: ", "Inserting Users To Users Table..");
			} 
	}
	protected void SyncWaterpoints(DbHandler db)
	{		
		   XMLParser parser = new XMLParser();		   
			InputStream xml = parser.getXmlFromUrl(_waterpoints_URL); // getting XML from URL
			DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
			DocumentBuilder builder = null;
			try {
				 builder = factory.newDocumentBuilder();
			} catch (ParserConfigurationException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			Document doc = null;
			try {
				doc = builder.parse(xml);
			} catch (SAXException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}// getting DOM element
			
			NodeList nl = doc.getElementsByTagName(KEY_WATERPOINT);
			// looping through all issue nodes <issue>
			for (int i = 0; i < nl.getLength(); i++) {
				Element e = (Element) nl.item(i);
			     db.addWaterpoint(new Waterpoints(Integer.parseInt(parser.getValue(e, KEY_WATERPOINTID)),			    		
			    		 parser.getValue(e, KEY_WATERPOINTNAME),
			    		 parser.getValue(e, KEY_DISTRICT_NAME),
			    		 parser.getValue(e, KEY_DIVISION_NAME),
			    		 parser.getValue(e, KEY_LOCATION_NAME),
			    		 parser.getValue(e, KEY_SUBLOCATION_NAME),
			    		 parser.getValue(e, KEY_VILLAGE_NAME),
			    		 parser.getValue(e, KEY_DIRECTIONS),
			    		 parser.getValue(e, KEY_PROMOTER_NAME),	
			    		 parser.getValue(e, KEY_PROMOTER_CONTACT1),	
			    		 parser.getValue(e, KEY_PROMOTER_CONTACT2),
			    		 parser.getValue(e, KEY_ASSISTANT_PROMOTER_NAME),	
			    		 parser.getValue(e, KEY_ASSISTANT_PROMOTER_CONTACT1),	
			    		 parser.getValue(e, KEY_ASSISTANT_PROMOTER_CONTACT2)
			    		 ));

			
			     Log.d("Insert: ", "Inserting Waterpoints To Waterpoints Table..");
			} 
	}	
	protected void setMetadata(DbHandler db, String userid)
	{
		 XMLParser parser = new XMLParser();		   
			InputStream xml = parser.getXmlFromUrl(_waterpoints_count_URL); // getting XML from URL
			InputStream xml1 = parser.getXmlFromUrl(_users_count_URL); // getting XML from URL
			DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
			DocumentBuilder builder = null;
			try {
				 builder = factory.newDocumentBuilder();
			} catch (ParserConfigurationException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			Document doc = null;
			Document doc1 = null;
			try {
				doc = builder.parse(xml);
				doc1 = builder.parse(xml1);
			} catch (SAXException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}// getting DOM element
			
			NodeList nl = doc.getElementsByTagName("count");
			NodeList nl1 = doc1.getElementsByTagName("count");
				Element e = (Element) nl.item(0);
				Element e1 = (Element) nl1.item(0);
			   db.addMetadata(new Metadata( Integer.parseInt(parser.getValue(e, "cnt")),
					   Integer.parseInt(parser.getValue(e1, "cnt")),
					   Integer.parseInt(userid)
					   ));		   

			
			     Log.d("Insert: ", "Inserting metadata To metadata Table..");
			 
	}
	protected void updateMetadata(DbHandler db)
	{
		 XMLParser parser = new XMLParser();		   
			InputStream xml = parser.getXmlFromUrl(_waterpoints_count_URL); // getting XML from URL
			InputStream xml1 = parser.getXmlFromUrl(_users_count_URL); // getting XML from URL
			DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
			DocumentBuilder builder = null;
			try {
				 builder = factory.newDocumentBuilder();
			} catch (ParserConfigurationException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			Document doc = null;
			Document doc1 = null;
			try {
				doc = builder.parse(xml);
				doc1 = builder.parse(xml1);
			} catch (SAXException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}// getting DOM element
			
			NodeList nl = doc.getElementsByTagName("count");
			NodeList nl1 = doc1.getElementsByTagName("count");
				Element e = (Element) nl.item(0);
				Element e1 = (Element) nl1.item(0);
			   db.updateMetadata(new Metadata(
					   Integer.parseInt(parser.getValue(e, "cnt")),
					   Integer.parseInt(parser.getValue(e1, "cnt"))
					   ));		   

			
			     Log.d("Insert: ", "Updating metadata To metadata Table..");
			 
	}
	protected void postData(String issueid,String comments,String date_resolved,String resolved_by) {
	    // Create a new HttpClient and Post Header
	    HttpClient httpclient = new DefaultHttpClient();
	    HttpPost httppost = new HttpPost("http://data.safe-water.org/rest/issues/resolveissue");

	    try {
	        // Add your data
	        List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(4);
	        nameValuePairs.add(new BasicNameValuePair("issueid", issueid));
	        nameValuePairs.add(new BasicNameValuePair("comments", comments));
	        nameValuePairs.add(new BasicNameValuePair("date_resolved", date_resolved));
	        nameValuePairs.add(new BasicNameValuePair("resolved_by", resolved_by));
	        httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

	        // Execute HTTP Post Request
	        HttpResponse response = httpclient.execute(httppost);
	        
	        
	    } catch (ClientProtocolException e1) {
	        // TODO Auto-generated catch block
	    	e1.printStackTrace();
	    } catch (IOException e1) {
	        // TODO Auto-generated catch block
	    	e1.printStackTrace();
	    }
	} 
}
