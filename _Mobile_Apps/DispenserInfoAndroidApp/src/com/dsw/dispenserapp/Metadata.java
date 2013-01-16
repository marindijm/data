package com.dsw.dispenserapp;

public class Metadata{
	
	//private variables
	
	
	int _serverdbwptscount;
	int _serverdbuserscount;
	int _userid;
	
	

	// Empty constructor
	public Metadata(){
		
	}
	// constructor
	public Metadata(  int serverdbwptscount, int serverdbuserscount,int userid){
	
		this._serverdbwptscount = serverdbwptscount;
		this._serverdbuserscount = serverdbuserscount;
		this._userid = userid;
		
	}	
	public Metadata(  int serverdbwptscount, int serverdbuserscount){
		
		this._serverdbwptscount = serverdbwptscount;
		this._serverdbuserscount = serverdbuserscount;

		
	}	
	
	/******************************************\
	 * 
	 * GET THE VARIABLES
	 */
	
	
	// get wpts count
	public int getwptsCount(){
		return this._serverdbwptscount;
	}
	// get users count
	public int getUsersCount(){
		return this._serverdbuserscount;
	}
	// get users id
	public int getUserId(){
		return this._userid;
	}
	/******************************************\
	 * 
	 * SET THE VARIABLES
	 */
		
	// set wpts count
	public void getwptsCount(int wptscount){
		this._serverdbwptscount = wptscount;
	}
	// set users count
	public void setUsersCount(int userscount){
		this._serverdbuserscount = userscount;
	}
	// set users id
	public void setUserid(int userid){
		this._userid = userid;
	}
	
}
