package com.dsw.dispenserapp;

public class Waterpoints {
	
	//private variables
	
	int _waterpointid;
	String _waterpointname;
	String _district_name;
	String _division_name;
	String _location_name;
	String _sublocation_name;
	String _village_name;
	String _directions;
	String _promoter_name;
	String _promoter_contact1;
	String _promoter_contact2;
	String _assistant_promoter_name;
	String _assistant_promoter_contact1;
	String _assistant_promoter_contact2;
	

	// Empty constructor
	public Waterpoints(){
		
	}
	// constructor
	public Waterpoints( int waterpointid,String waterpointname,	String district_name,
	String division_name,String location_name,	String sublocation_name,String village_name,String directions,
	String promoter_name,String promoter_contact1,String promoter_contact2,	String assistant_promoter_name,
	String assistant_promoter_contact1,	String assistant_promoter_contact2){
		this._waterpointid = waterpointid;
		this._waterpointname = waterpointname;
		this._district_name = district_name;
		this._division_name = division_name;
		this._location_name = location_name;
		this._sublocation_name = sublocation_name;
		this._village_name = village_name;
		this._directions = directions;
		this._promoter_name = promoter_name;
		this._promoter_contact1 = promoter_contact1;
		this._promoter_contact2 = promoter_contact2;
		this._assistant_promoter_name = assistant_promoter_name;
		this._assistant_promoter_contact1 = assistant_promoter_contact1;
		this._assistant_promoter_contact2 = assistant_promoter_contact2;
		
	}
	
	/******************************************\
	 * 
	 * GET THE VARIABLES
	 */

	public int getwaterpointID(){
		return this._waterpointid;
	}	
	public String getwaterpointName(){
		return this._waterpointname;
	}	
	public String getdistrictName(){
		return this._district_name;
	}
	public String getdivisionName(){
		return this._division_name;
	}
	public String getlocationName(){
		return this._location_name;
	}
	public String getsublocationName(){
		return this._sublocation_name;
	}
	public String getvillageName(){
		return this._village_name;
	}
	public String getDirections(){
		return this._directions;
	}
	public String getPromoterName(){
		return this._promoter_name;
	}
	public String getPromoterContact1(){
		return this._promoter_contact1;
	}
	public String getPromoterContact2(){
		return this._promoter_contact2;
	}
	public String getAssistantPromoterName(){
		return this._assistant_promoter_name;
	}
	public String getAssistantPromoterContact1(){
		return this._assistant_promoter_contact1;
	}
	public String getAssistantPromoterContact2(){
		return this._assistant_promoter_contact2;
	}
	
	/******************************************\
	 * 
	 * SET THE VARIABLES
	 */

	public void setwaterpointID(int waterpointid){
		 this._waterpointid = waterpointid;
	}	
	public void setwaterpointName(String waterpointname){
		 this._waterpointname = waterpointname;
	}	
	public void setdistrictName(String districtname){
		 this._district_name = districtname;
	}
	public void setdivisionName(String divisionname){
		 this._division_name = divisionname;
	}
	public void setlocationName(String locationname){
		 this._location_name = locationname;
	}
	public void setsublocationName(String sublocationname){
		 this._sublocation_name = sublocationname;
	}
	public void setvillageName(String villagename){
		 this._village_name = villagename;
	}
	public void setDirections(String directions){
		 this._directions = directions;
	}
	public void setPromoterName(String promotername){
		 this._promoter_name = promotername;
	}
	public void setPromoterContact1(String promotercontact1){
		 this._promoter_contact1 = promotercontact1;
	}
	public void setPromoterContact2(String promotercontact2){
		 this._promoter_contact2 = promotercontact2;
	}
	public void setAssistantPromoterName(String assistantpromotername){
		 this._assistant_promoter_name = assistantpromotername;
	}
	public void setAssistantPromoterContact1(String assistantpromotercontact1){
		 this._assistant_promoter_contact1 = assistantpromotercontact1;
	}
	public void setAssistantPromoterContact2(String assitantpromotercontact2){
		 this._assistant_promoter_contact2 = assitantpromotercontact2;
	}
}
