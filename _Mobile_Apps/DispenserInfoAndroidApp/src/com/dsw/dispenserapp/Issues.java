package com.dsw.dispenserapp;

public class Issues {
	
	//private variables
	int _issueid;
	int _waterpointid;
	String _waterpointname;
	String _date_created;
	String _status;
	String _user_assigned;
	String _issue_type;
	String _date_resolved;
	String _comments;
	

	// Empty constructor
	public Issues(){
		
	}
	// constructor
	public Issues(int issueid, int waterpointid, String waterpointname, String date_created, String status,
			String user_assigned, String issue_type, String date_resolved, String comments){
		this._issueid = issueid;
		this._waterpointid = waterpointid;
		this._waterpointname = waterpointname;
		this._date_created = date_created;
		this._status = status;
		this._user_assigned = user_assigned;
		this._issue_type = issue_type;
		this._date_resolved = date_resolved;
		this._comments = comments;
	}
	public Issues(int issueid,String status, String date_resolved, String comments){		
		this._issueid = issueid;
		this._status = status;		
		this._date_resolved = date_resolved;
		this._comments = comments;
	}
	/******************************************\
	 * 
	 * GET THE VARIABLES
	 */
	
	// getting Issue ID
	public int getissueID(){
		return this._issueid;
	}	
	// getting Waterpoint ID
	public int getwaterpointID(){
		return this._waterpointid;
	}
	// getting Waterpoint Name
	public String getwaterpointName(){
		return this._waterpointname;
	}	
	//getting date created
	public String getDateCreated(){
		return this._date_created;
	}
	//getting issue status
	public String getIssueStatus(){	
		 return this._status;
	}
	//getting user assigned
	public String getUserAssigned(){
		return this._user_assigned;
	}
	//getting issue type
	public String getIssueType(){
		return this._issue_type;
	}
	//getting date resolved
	public String getDateResolved(){
		return this._date_resolved;
	}
	//getting comments
	public String getComments(){
		return this._comments;
	}
	/******************************************\
	 * 
	 * SET THE VARIABLES
	 */
	// setting Issue ID
	public void setissueID(int issueid){
		this._issueid = issueid;
	}	
	// setting Waterpoint ID
	public void setwaterpointID(int waterpointid){
		 this._waterpointid = waterpointid;
	}
	// setting Waterpoint Name
	public void setwaterpointName(String waterpointname){
		 this._waterpointname = waterpointname;
	}	
	//setting date created
	public void setDateCreated(String date_created){
		 this._date_created = date_created;
	}
		// setting status
	public void setIssueStatus(String status){
		this._status = status;
	}
	//setting user assigned
	public void setUserAssigned(String user_assigned){
		 this._user_assigned = user_assigned;
	}
	//setting issue type
	public void setIssueType(String issue_type){
		 this._issue_type = issue_type;
	}
	//set date resolved
	public void setDateResolved(String date_resolved){
		this._date_resolved = date_resolved;
	}
	// setting comments
	public void setComments(String comments){
		this._comments = comments;
	}
}
