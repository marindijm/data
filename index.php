<?php 
if(!isset($_SESSION))
{
 session_start();//start new session
}
$_SESSION['headertype'] = 'gen';// set the default header for the pages
include 'php_funcs/funcs.php'; //include all the functions to be used all the pages 
include 'php_funcs/header.php';
?>
<div class="summary_layout">
 
   <span class="dropcharacter">W</span>elcome <span class="username"><?php echo @$_SESSION['fname'];?> </span> <img src="images/wazi.png" alt="" name="wazi_mzeiya" width="47" height="40" id="img1" />, to the dispensers for safe water data portal. We hope to serve all your data needs here. But in case we don't, <a href="#">please let us know</a> so that we serve you best.
  
   <div class="center_header">Program Summary</div>
  <div class="summary_layout">   
<div class="para_headings">Spring Protection</div>
<span class="dropcharacter">I</span>nnovations for Poverty Action began researching outcomes related to safe water programs in 2003 in collaboration with researchers at Harvard University and the University of California, Berkeley.<a href="http://www.poverty-action.org/project/0329"> An early study</a> evaluated the effectiveness of protecting springs in rural areas where piped water is not cost-effective or feasible to implement.

This study found that spring protection reduced source contamination by 66%, but that contamination of household drinking water only decreased by 24% as a result of unhygienic water collection and storage practices. This finding highlighted the importance of protecting against recontamination.
<br/>
<br/>
<div class="para_headings">Dispensers and Household Water Treatment</div>
<p><span class="dropcharacter">F</span>ollowing these findings, the research team began investigating strategies to encourage adoption of household chlorination, a water treatment technology that protects against recontamination. It was during this period that the Chlorine Dispenser System was invented.
  
  A randomized controlled trial was conducted in Kenya to compare the CDS to other chlorination options. <a href="http://www.poverty-action.org/work/projects/safewater">This study</a> found that the CDS was highly popular with communities: 50-61% of sampled households in communities with dispensers had detectable chlorine in their water up to two and a half years after the intervention, versus 6-14% of households in the control group. None of the other methods for incentivizing chlorination that were evaluated in this study had similar levels of sustained adoption.
  
  DSW began to scale the project with the installation of 33 MoE dispensers in November 2009. Since then, the project has grown rapidly through collaborations with local authorities such as <a href="#">BMC</a> and <a href="#">BCC</a>, ministries such as <a href="#">MoE</a> and <a href="#">MoPHS</a>, the social enterprise <a href="#">OAF</a>, and research projects such as <a href="#">PMI </a>and <a href="#">WASH-Benefits</a>. There are currently over 2,000 dispensers in Western, Nyanza, and Eastern Provinces, providing an estimated 420,000 people with access to safe water.
  <br/>
  <img id="img2" name="total_dispensers_installed" src="images/total_disps.png" alt="" /></p>
<div class="compiled_by">Compiled By: Katherine</div>
 <br/>
 <br/>
</div> <!--end of summary layout-->


<?php include 'php_funcs/footer.php'; ?>


