@props(['applicant'])

<td>{{ $applicant->first_name }}</td>
<td>{{ $applicant->middle_name }}</td>
<td>{{ $applicant->last_name }}</td>
<td>{{ $applicant->birth_date }}</td>
<td>{{ $applicant->gender }}</td>
<td>{{ $applicant->civil_status }}</td>
<td>{{ $applicant->address->street }}</td>
<td>{{ $applicant->address->barangay }}</td>
<td>{{ $applicant->address->city }}</td>
<td>{{ $applicant->address->province }}</td>
<td>{{ $applicant->address->region }}</td>
<td>{{ $applicant->address->zipcode }}</td>
<td>{{ $applicant->contact->contact_number }}</td>
<td>{{ $applicant->contact->email }}</td>
<td>{{ $applicant->school->desired_school }}</td>
<td>{{ $applicant->school->course_name }}</td>
<td>{{ $applicant->school->hei_type }}</td>
<td>{{ $applicant->school->school_last_attended }}</td>
<td>{{ $applicant->nationality }}</td>
<td>{{ $applicant->educational_attainment }}</td>
<td>{{ $applicant->years_in_city }}</td>
<td>{{ $applicant->family_income }}</td>
<td>{{ $applicant->registered_voter }}</td>
<td>{{ $applicant->gwa }}</td>
