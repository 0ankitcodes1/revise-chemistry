<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<h3>StudyBuddy</h3>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
