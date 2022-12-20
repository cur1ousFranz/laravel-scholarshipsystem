@props(['applicant'])

<td class="">{{ $applicant->last_name }}</td>
<td class="">{{ $applicant->first_name }}</td>
<td class="">{{ $applicant->middle_name }}</td>
<td class="">{{ \Carbon\Carbon::parse($applicant->birth_date)->age }}</td>
<td class="">{{ $applicant->gender }}</td>
<td class="">{{ $applicant->contact->contact_number }}</td>
<td class="">{{ $applicant->contact->email }}</td>
