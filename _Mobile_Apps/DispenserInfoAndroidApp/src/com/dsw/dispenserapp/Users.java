package com.dsw.dispenserapp;

public class Users {
	
	//private variables
	
	int _userid;
	String _username;
	String _password;
	String _email;
	

	// Empty constructor
	public Users(){
		
	}
	// constructor
	public Users( int userid, String username, String password,
			String email){
		this._userid = userid;
		this._username = username;
		this._password= password;
		this._email = email;
	
		
	}	
	
	
	/******************************************\
	 * 
	 * GET THE VARIABLES
	 */
	
	// getting user ID
	public int getuserID(){
		return this._userid;
	}	
	// getting user name
	public String getuserName(){
		return this._username;
	}
	// getting password
	public String getPassword(){
		return this._password;
	}	
	//getting email
	public String getEmail(){
		return this._email;
	}
	
	
	/******************************************\
	 * 
	 * SET THE VARIABLES
	 */
	public void setuserID(int userid){
		this._userid = userid;
	}	
	// setting user name
	public void setuserName(String username){
		 this._username = username;
	}
	// setting password
	public void setPassword(String password){
		 this._password = password;
	}	
	//setting email
	public void  setEmail(String email){
		this._email = email;
	}
		
	
}
