@props(['applicant'])

<td class="text-center">{{ $applicant->first_name }}</td>
<td class="text-center">{{ $applicant->middle_name }}</td>
<td class="text-center">{{ $applicant->last_name }}</td>
<td class="text-center">{{ \Carbon\Carbon::parse($applicant->birth_date)->age }}</td>
<td class="text-center">{{ $applicant->gender }}</td>
<td class="text-center">{{ $applicant->civil_status }}</td>
<td class="text-center">{{ $applicant->contact->contact_number }}</td>
<td class="text-center">{{ $applicant->contact->email }}</td>
