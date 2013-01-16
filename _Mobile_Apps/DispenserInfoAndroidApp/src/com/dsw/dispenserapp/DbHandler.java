package com.dsw.dispenserapp;

import java.util.ArrayList;
import java.util.List;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

public class DbHandler extends SQLiteOpenHelper {

	// All  variables
	// Database Version
	protected  final static int DATABASE_VERSION = 1;

	// Database Name
	protected  final static String DATABASE_NAME = "dsw_db";

	// tables
	protected  final String TABLE_ISSUES= "dsw_issues";
	protected  final String TABLE_USERS= "dsw_users";
	protected  final String TABLE_WATERPOINTS= "dsw_waterpoints";
	protected  final String TABLE_METADATA= "dsw_metadata";

	// Contacts Table Columns names
	//issues
	protected  final String KEY_ISSUE_ID = "issueid";
	protected  final String KEY_WATERPOINT_ID = "waterpointid";
	protected  final String KEY_WATERPOINT_NAME = "waterpointname";
	protected  final String KEY_DATE_CREATED = "date_created";
	protected  final String KEY_STATUS = "status";
	protected  final String KEY_USER_ASSIGNED = "user_assigned";
	protected  final String KEY_ISSUE_TYPE = "issue_type";
	protected  final String KEY_DATE_RESOLVED= "date_resolved";
	protected  final String KEY_COMMENTS= "comments";
	
	//users
	protected  final String KEY_USER_ID = "userid";
	protected  final String KEY_USERNAME = "username";
	protected  final String KEY_PASSWORD = "password";
	protected  final String KEY_EMAIL = "email";
	
	
	//waterpoints	
	protected  final String KEY_WATERPOINTID = "waterpoint_id";
	protected  final String KEY_WATERPOINTNAME = "waterpoint_name";
	protected  final String KEY_DISTRICT_NAME = "district_name";
	protected  final String KEY_DIVISION_NAME= "division_name";
	protected  final String KEY_LOCATION_NAME = "location_name";
	protected  final String KEY_SUBLOCATION_NAME = "sublocation";
	protected  final String KEY_VILLAGE_NAME= "village";
	protected  final String KEY_DIRECTIONS = "directions";
	protected  final String KEY_PROMOTER_NAME = "promoter";
	protected  final String KEY_PROMOTER_CONTACT1 = "promoter_contact1";
	protected  final String KEY_PROMOTER_CONTACT2 = "promoter_contact2";
	protected  final String KEY_ASSISTANT_PROMOTER_NAME = "assistant_promoter";
	protected  final String KEY_ASSISTANT_PROMOTER_CONTACT1 = "assistant_promoter_contact1";
	protected  final String KEY_ASSISTANT_PROMOTER_CONTACT2 = "assistant_promoter_contact2";
	
	//users		
		protected  final String KEY_SERVERDBWPTSCOUNT = "serverdbwptscount";
		protected  final String KEY_SERVERDBUSERSCOUNT = "serverdbuserscount";
		protected  final String KEY_USERID = "userid";
		
	public DbHandler(Context context) {
		super(context, DATABASE_NAME, null, DATABASE_VERSION);
	}

	// Creating Tables
	@Override
	public void onCreate(SQLiteDatabase db) {
		String CREATE_ISSUES_TABLE = "CREATE TABLE " + TABLE_ISSUES + "("
				+ KEY_ISSUE_ID + " INTEGER,"
				+ KEY_WATERPOINT_ID + " INTEGER,"
				+ KEY_WATERPOINT_NAME + " TEXT,"
				+ KEY_DATE_CREATED + " TEXT,"
				+ KEY_STATUS + " TEXT,"
				+ KEY_USER_ASSIGNED + " TEXT,"
				+ KEY_ISSUE_TYPE + " TEXT,"
				+ KEY_DATE_RESOLVED + " TEXT,"
				+ KEY_COMMENTS + " TEXT" + ")";
		
		String CREATE_USERS_TABLE = "CREATE TABLE " + TABLE_USERS+ "("
				+ KEY_USER_ID + " INTEGER,"
				+ KEY_USERNAME + " 	TEXT,"
				+ KEY_PASSWORD + " TEXT,"
				+ KEY_EMAIL + " TEXT" + ")";
		
		String CREATE_WATERPOINTS_TABLE = "CREATE TABLE " + TABLE_WATERPOINTS + "("
				+ KEY_WATERPOINTID + " INTEGER,"
				+ KEY_WATERPOINTNAME + " TEXT,"
				+ KEY_DISTRICT_NAME + " TEXT,"
				+ KEY_DIVISION_NAME + " TEXT,"
				+ KEY_LOCATION_NAME + " TEXT,"
				+ KEY_SUBLOCATION_NAME + " TEXT,"
				+ KEY_VILLAGE_NAME + " TEXT,"
				+ KEY_DIRECTIONS + " TEXT,"
				+ KEY_PROMOTER_NAME + " TEXT,"
				+ KEY_PROMOTER_CONTACT1 + " TEXT,"
				+ KEY_PROMOTER_CONTACT2 + " TEXT,"
				+ KEY_ASSISTANT_PROMOTER_NAME + " TEXT,"
				+ KEY_ASSISTANT_PROMOTER_CONTACT1 + " TEXT,"				
				+ KEY_ASSISTANT_PROMOTER_CONTACT2 + " TEXT" + ")";
		
		String CREATE_METADATA_TABLE = "CREATE TABLE " + TABLE_METADATA+ "("
				+ KEY_SERVERDBWPTSCOUNT + " INTEGER,"
				+ KEY_SERVERDBUSERSCOUNT + " INTEGER,"
				+ KEY_USERID + " INTEGER" + ")";
		
		
		db.execSQL(CREATE_ISSUES_TABLE);
		db.execSQL(CREATE_USERS_TABLE);
		db.execSQL(CREATE_WATERPOINTS_TABLE);
		db.execSQL(CREATE_METADATA_TABLE);
	}

	// Upgrading database
	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		 if (newVersion > oldVersion)
		        Log.v("Database Upgrade", "Database version higher than old.");
		// Drop older table if existed
		db.execSQL("DROP TABLE IF EXISTS " + TABLE_ISSUES);
		db.execSQL("DROP TABLE IF EXISTS " + TABLE_USERS);
		db.execSQL("DROP TABLE IF EXISTS " + TABLE_WATERPOINTS);
		db.execSQL("DROP TABLE IF EXISTS " + TABLE_METADATA);

		// Create tables again
		onCreate(db);
	}

	/**
	 * All CRUD(Create, Read, Update, Delete) Operations
	 */
	// Adding new issue
		void addIssue(Issues issue) {
			SQLiteDatabase db = this.getWritableDatabase();

			ContentValues values = new ContentValues();
			values.put(KEY_ISSUE_ID , issue.getissueID()); // Issue ID
			values.put(KEY_WATERPOINT_ID, issue.getwaterpointID()); // Waterpoint ID
			values.put(KEY_WATERPOINT_NAME, issue.getwaterpointName()); // Waterpoint Name
			values.put(KEY_DATE_CREATED, issue.getDateCreated()); // Date Created
			values.put(KEY_STATUS, issue.getIssueStatus()); // Status
			values.put(KEY_USER_ASSIGNED, issue.getUserAssigned()); // User Assigned
			values.put(KEY_ISSUE_TYPE, issue.getIssueType()); // Issue Type
			values.put(KEY_DATE_RESOLVED, issue.getDateResolved()); // Date Resolved
			values.put(KEY_COMMENTS, issue.getComments()); // Comments
			

			// Inserting Row
			db.insert(TABLE_ISSUES, null, values);
			db.close(); // Closing database connection
		}
		
		// Getting single issue
		Issues getIssue(int issueid) {
			SQLiteDatabase db = this.getReadableDatabase();

			Cursor cursor = db.query(TABLE_ISSUES, new String[] { KEY_ISSUE_ID,  KEY_WATERPOINT_ID, KEY_WATERPOINT_NAME,
					KEY_DATE_CREATED, KEY_STATUS,KEY_USER_ASSIGNED,KEY_ISSUE_TYPE,KEY_DATE_RESOLVED,
					KEY_COMMENTS}, KEY_ISSUE_ID + "=?",
					new String[] { String.valueOf(issueid) }, null, null, null,null);
			if (cursor != null)
				cursor.moveToFirst();

			Issues issue = new Issues(Integer.parseInt(cursor.getString(0)),
					Integer.parseInt(cursor.getString(1)),
					cursor.getString(2), 
					cursor.getString(3), 
					cursor.getString(4),
					cursor.getString(5), 
					cursor.getString(6), 
					cursor.getString(7), 
					cursor.getString(8));
			
			db.close(); // Closing database connection
			// return issue
			return issue;
		}
		
		// Getting All Issues
		public List<Issues> getAllIssues() {
			List<Issues> issuesList = new ArrayList<Issues>();
			// Select All Query
			String selectQuery = "SELECT  * FROM " + TABLE_ISSUES;

			SQLiteDatabase db = this.getWritableDatabase();
			Cursor cursor = db.rawQuery(selectQuery, null);

			// looping through all rows and adding to list
			if (cursor.moveToFirst()) {
				do {
					Issues issue = new Issues();
					issue.setissueID(Integer.parseInt(cursor.getString(0)));
					issue.setwaterpointID(Integer.parseInt(cursor.getString(1)));
					issue.setwaterpointName(cursor.getString(2));
					issue.setDateCreated(cursor.getString(3));
					issue.setIssueStatus(cursor.getString(4));
					issue.setUserAssigned(cursor.getString(5));
					issue.setIssueType(cursor.getString(6));
					issue.setDateResolved(cursor.getString(7));
					issue.setComments(cursor.getString(8));
					// Adding issue to list
					issuesList.add(issue);
				} while (cursor.moveToNext());
			}
			db.close(); // Closing database connection
			// return issues list
			return issuesList;
		}
		// Updating single issue
		public int updateIssue(Issues issue) {
			SQLiteDatabase db = this.getWritableDatabase();

			ContentValues values = new ContentValues();
			values.put(KEY_STATUS, issue.getIssueStatus()); // Status		
			values.put(KEY_DATE_RESOLVED, issue.getDateResolved()); // Date Resolved
			values.put(KEY_COMMENTS, issue.getComments()); // Comments

			// updating row
			int rowUpdated = db.update(TABLE_ISSUES, values, KEY_ISSUE_ID + " = ?",
					new String[] { String.valueOf(issue.getissueID()) });
			
			db.close();
			return rowUpdated;
		}

		/**USERS***/
		// Adding new user
		void addUser(Users user) {
			SQLiteDatabase db = this.getWritableDatabase();
			ContentValues values = new ContentValues();
			values.put(KEY_USER_ID , user.getuserID()); // User ID
			values.put(KEY_USERNAME, user.getuserName()); // Username 
			values.put(KEY_PASSWORD, user.getPassword()); // Password
			values.put(KEY_EMAIL, user.getEmail()); // Email
			

			// Inserting Row
			db.insert(TABLE_USERS, null, values);
			db.close(); // Closing database connection
		}
		// Getting single user
		Users getUser(int userid) {
			SQLiteDatabase db = this.getReadableDatabase();
			Cursor cursor = db.query(TABLE_USERS, new String[] { KEY_USER_ID,  KEY_USERNAME, KEY_PASSWORD,
					KEY_EMAIL}, KEY_USER_ID + "=?",
					new String[] { String.valueOf(userid) }, null, null, null,null);
			if (cursor != null)
				cursor.moveToFirst();
			Users user = new Users(Integer.parseInt(cursor.getString(0)),
					cursor.getString(1),
					cursor.getString(2), 
					cursor.getString(3));
			
			db.close(); // Closing database connection
			// return issue
			return user;
		}
		// Getting All Users
		public List<Users> getAllUsers() {
			List<Users> usersList = new ArrayList<Users>();
			// Select All Query
			String selectQuery = "SELECT  * FROM " + TABLE_USERS;

			SQLiteDatabase db = this.getWritableDatabase();
			Cursor cursor = db.rawQuery(selectQuery, null);

			// looping through all rows and adding to list
			if (cursor.moveToFirst()) {
				do {
					Users user = new Users();
					user.setuserID(Integer.parseInt(cursor.getString(0)));
					user.setuserName(cursor.getString(1));
					user.setPassword(cursor.getString(2));
					user.setEmail(cursor.getString(3));
							
					
					// Adding user to list
					usersList.add(user);
				} while (cursor.moveToNext());
			}
			db.close(); // Closing database connection
			// return issues list
			return usersList;
		}
		
		/**WATERPOINTS***/
		// Adding new waterpoint
		void addWaterpoint(Waterpoints waterpoint) {
			SQLiteDatabase db = this.getWritableDatabase();
			ContentValues values = new ContentValues();
			
			values.put(KEY_WATERPOINTID , waterpoint.getwaterpointID()); 
			values.put(KEY_WATERPOINTNAME , waterpoint.getwaterpointName()); 
			values.put(KEY_DISTRICT_NAME , waterpoint.getdistrictName()); 
			values.put(KEY_DIVISION_NAME , waterpoint.getdivisionName()); 
			values.put(KEY_LOCATION_NAME , waterpoint.getlocationName()); 
			values.put(KEY_SUBLOCATION_NAME , waterpoint.getsublocationName()); 
			values.put(KEY_DIRECTIONS , waterpoint.getDirections()); 
			values.put(KEY_PROMOTER_NAME , waterpoint.getPromoterName()); 
			values.put(KEY_PROMOTER_CONTACT1 , waterpoint.getAssistantPromoterContact1()); 
			values.put(KEY_PROMOTER_CONTACT2 , waterpoint.getAssistantPromoterContact2()); 
			values.put(KEY_ASSISTANT_PROMOTER_NAME , waterpoint.getAssistantPromoterName()); 
			values.put(KEY_ASSISTANT_PROMOTER_CONTACT1 , waterpoint.getAssistantPromoterContact1()); 
			values.put(KEY_ASSISTANT_PROMOTER_CONTACT2 , waterpoint.getAssistantPromoterContact2()); 
			
			// Inserting Row
			db.insert(TABLE_WATERPOINTS, null, values);
			db.close(); // Closing database connection
		}
		// Getting single waterpoint
		Waterpoints getWaterpoint(int waterpointid) {
			SQLiteDatabase db = this.getReadableDatabase();
			Cursor cursor = db.query(TABLE_WATERPOINTS, new String[] { KEY_WATERPOINTID,  KEY_WATERPOINTNAME, KEY_DISTRICT_NAME,
					KEY_DIVISION_NAME, 
					KEY_LOCATION_NAME,
					KEY_SUBLOCATION_NAME,KEY_VILLAGE_NAME,KEY_DIRECTIONS, KEY_PROMOTER_NAME,KEY_PROMOTER_CONTACT1,
					KEY_PROMOTER_CONTACT2,KEY_ASSISTANT_PROMOTER_NAME,
					KEY_ASSISTANT_PROMOTER_CONTACT1,KEY_ASSISTANT_PROMOTER_CONTACT2}, KEY_WATERPOINTID + "=?",
					new String[] { String.valueOf(waterpointid) }, null, null, null,null);
			if (cursor != null)
				cursor.moveToFirst();
			Waterpoints waterpoint = new Waterpoints(Integer.parseInt(cursor.getString(0)),
					cursor.getString(1),
					cursor.getString(2), 
					cursor.getString(3), 
					cursor.getString(4), 
					cursor.getString(5), 
					cursor.getString(6), 
					cursor.getString(7), 
					cursor.getString(8), 
					cursor.getString(9), 
					cursor.getString(10), 
					cursor.getString(11), 
					cursor.getString(12), 
					cursor.getString(13));
			
			db.close(); // Closing database connection
			// return issue
			return waterpoint;
		}
		// Getting All Waterpoint IDS
		public List<Waterpoints> getAllWaterpointIDS() {
			List<Waterpoints> waterpointsList = new ArrayList<Waterpoints>();
			// Select All Query
			String selectQuery = "SELECT "+KEY_WATERPOINTID+" FROM " + TABLE_WATERPOINTS;
			SQLiteDatabase db = this.getWritableDatabase();
			Cursor cursor = db.rawQuery(selectQuery, null);

			// looping through all rows and adding to list
			if (cursor.moveToFirst()) {
				do {
					Waterpoints waterpoint = new Waterpoints();
					waterpoint.setwaterpointID(Integer.parseInt(cursor.getString(0)));							
					
					// Adding waterpoint ids to list
					waterpointsList.add(waterpoint);
				} while (cursor.moveToNext());
			}
			db.close(); // Closing database connection
			// return waterpoint ids list
			return waterpointsList;
		}
		/**METADATA***/
		// Adding new metadata
		void addMetadata(Metadata md) {
			SQLiteDatabase db = this.getWritableDatabase();
			ContentValues values = new ContentValues();
		
			values.put(KEY_SERVERDBWPTSCOUNT , md.getwptsCount()); // server wpts count
			values.put(KEY_SERVERDBUSERSCOUNT , md.getUsersCount()); // server user count
			values.put(KEY_USERID , md.getUserId()); // user_id
			// Inserting Row
			db.insert(TABLE_METADATA, null, values);
			db.close(); // Closing database connection
		}
		// Getting single metadata
		Metadata getMetadata() {
			SQLiteDatabase db = this.getReadableDatabase();
			Cursor cursor = db.query(TABLE_METADATA, new String[] {   KEY_SERVERDBWPTSCOUNT,
					KEY_SERVERDBUSERSCOUNT, KEY_USERID }, null,
					null, null, null, null,null);
			if (cursor != null)
				cursor.moveToFirst();
			Metadata md = new Metadata(Integer.parseInt(cursor.getString(0)),
					Integer.parseInt(cursor.getString(1)),
					Integer.parseInt(cursor.getString(2)));
			
			db.close(); // Closing database connection
			// return issue
			return md;
		}
		
		// Updating metadata
		public int updateMetadata(Metadata md) 
		{
			SQLiteDatabase db = this.getWritableDatabase();
			ContentValues values = new ContentValues();			
			values.put(KEY_SERVERDBWPTSCOUNT , md.getwptsCount()); // server wpts count
			values.put(KEY_SERVERDBUSERSCOUNT , md.getUsersCount()); // server user count
			
			// updating row
			int rowUpdated = db.update(TABLE_METADATA, values, null,null);
			
			db.close();
			return rowUpdated;
		}
		// Getting table Count
	    public int getCount(String tblName) {
	        String countQuery = "SELECT  * FROM " + tblName;
	        SQLiteDatabase db = this.getReadableDatabase();
	        Cursor cursor = db.rawQuery(countQuery, null);
	        
			   int tblCount = cursor.getCount();
			   cursor.close();
			   db.close(); // Closing database connection
	        // return count
	        return tblCount;
	    }
	    
	    //delete from table
	    public void deleteFromTable(String tblName) {
	        String delQuery = "DELETE FROM " + tblName;
	        SQLiteDatabase db = this.getWritableDatabase();
	        Cursor cursor = db.rawQuery(delQuery, null);
	        cursor.close();			
			db.close(); // Closing database connection
	        
	        
	    }
	    public boolean checkIfFieldExists(String dbFieldName, String FieldName, String tblName) {
	    	boolean FieldExists = false;
	        String existsQuery = "SELECT count(*) as cnt  FROM " + tblName + " WHERE " + dbFieldName + " = '" + FieldName + "'";
	        SQLiteDatabase db = this.getWritableDatabase();
	        Cursor cursor = db.rawQuery(existsQuery, null);
	        if (cursor != null)
				cursor.moveToFirst();
	        int count = Integer.parseInt(cursor.getString(0));
	        if(count > 0)
	        {
	        	FieldExists = true;
	        }
	       
	        cursor.close();			
			db.close(); // Closing database connection
	        return FieldExists;
	        
	    }

}
