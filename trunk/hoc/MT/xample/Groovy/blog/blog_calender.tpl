<div class="dateBlock">
<MTArchivePrevious>
<p class="previous"><a href="javascript:void(0);" onclick="changeMonth('<$MTBlogArchiveURL$><MTArchiveDate format="calendar/%Y/%m/%i">');"><img src="<$MTBlogURL$>images/img_previous.gif" alt="" /></a></p>
</MTArchivePrevious>
<p class="date"><$MTArchiveDate format="%Y年%m月"$></p>
<MTArchiveNext>
<p class="next"><a href="javascript:void(0);" onclick="changeMonth('<$MTBlogArchiveURL$><MTArchiveDate format="calendar/%Y/%m/%i">');" ><img src="<$MTBlogURL$>images/img_next.gif" alt="" /></a></p>
</MTArchiveNext>
</div>
<table>
<tr>
<th><img src="<$MTBlogURL$>images/txt_sun.gif" alt="SUN" /></th>
<th><img src="<$MTBlogURL$>images/txt_mon.gif" alt="MON" /></th>
<th><img src="<$MTBlogURL$>images/txt_tue.gif" alt="TUE" /></th>
<th><img src="<$MTBlogURL$>images/txt_wed.gif" alt="WED" /></th>
<th><img src="<$MTBlogURL$>images/txt_thu.gif" alt="THU" /></th>
<th><img src="<$MTBlogURL$>images/txt_fri.gif" alt="FRI" /></th>
<th><img src="<$MTBlogURL$>images/txt_sat.gif" alt="SAT" /></th>
</tr>

<MTCalendar month="this">
<MTCalendarWeekHeader>
<tr>
</MTCalendarWeekHeader>

<td>

<MTCalendarIfEntries>
<MTEntries lastn="1">
<a href="<$MTEntryLink archive_type="Daily"$>"><$MTCalendarDay$></a>
</MTEntries>
</MTCalendarIfEntries>

<MTCalendarIfNoEntries>
<$MTCalendarDay$>
</MTCalendarIfNoEntries>

<MTCalendarIfBlank>
&nbsp;
</MTCalendarIfBlank>

</td>
<MTCalendarWeekFooter>
</tr>
</MTCalendarWeekFooter>
</MTCalendar>
</table>