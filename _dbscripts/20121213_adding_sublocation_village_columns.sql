alter table waterpoints  add column sublocation character varying(255);
alter table waterpoints  add column village character varying(255);


update waterpoints set sublocation = ver.subloc, village = ver.village from(select t016 as subloc, t017 as village ,t102 as wptid from verification_survey.verification_info)ver 
where waterpoints.waterpoint_id = ver.wptid::integer


-------------13/12/2012-----------------------------------------
Created views; issues_all, issues_resolved, issues_not_resolved
For use in making dashboards
----------------------------------------------------------------
