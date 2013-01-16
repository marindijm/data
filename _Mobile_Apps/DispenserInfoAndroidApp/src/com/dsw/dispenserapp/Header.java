package com.dsw.dispenserapp;

import android.content.Context;
import android.content.Intent;
import android.util.AttributeSet;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.app.Activity;

public class Header extends RelativeLayout implements OnClickListener {
public static final String TAG = Header.class.getSimpleName();

protected ImageView homeIcon, arrowSelector;
private TextView label;
private Activity a = null;

public Header(Context context) {
    super(context); 

    
}

public Header(Context context, AttributeSet attrs) {
    super(context, attrs);
}

public Header(Context context, AttributeSet attrs, int defStyle) {
    super(context, attrs, defStyle);
}

protected void initHeader() {
        inflateHeader();
        setOnClickListener(this);
}

private void inflateHeader() {
    LayoutInflater inflater = (LayoutInflater) getContext()
            .getSystemService(Context.LAYOUT_INFLATER_SERVICE);
    inflater.inflate(R.layout.header, this);
    homeIcon = (ImageView) findViewById(R.id.home_icon);
    arrowSelector = (ImageView) findViewById(R.id.arrow_selection);
    label = (TextView) findViewById(R.id.header_title);
   
}

public void onClick(View v) {
	// Start issue tracker
	Intent i = new Intent(getContext(), HomeActivity.class);
	i.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_SINGLE_TOP);
getContext().startActivity(i);//start activity from new context
	//i.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
	 // Log.d("Click Activty", "This should now take you home...");
}

}