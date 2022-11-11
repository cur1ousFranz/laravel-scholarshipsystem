<!DOCTYPE html>
<html lang="en">
<head>
    <style>

        #backround-wrapper{
            background: url({{ public_path('storage/img/aklat_logo.png') }});
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
            opacity: 0.1
        }

        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            /* margin-top: 40px; */
            width: 100%;
        }

        td, th{
            padding-top: 10px;
            padding-bottom: 10px;
        }

        tr{
            text-align: center;
        }

        .text-header{
            margin: 0;
            padding: 0;
            font-size: 20px;
        }

        .page-break {
            page-break-after: always;
        }

        .family-income{
            margin: 0;
            padding: 3;
        }
    </style>
    <title>Annual Data Report of Applications: {{ $year .' - ' . $year + 1 }}</title>
</head>
<body>
    <header>
        <img src="{{ public_path('storage/img/header_logo.png') }}" alt=""
            style="width: 100%;">
        <p style="margin: 0; padding: 0; float: right; margin-top: 50px">
            {{ date_format(Carbon\Carbon::now(), 'M/d/Y') }}
        </p>
    </header>
    <div id="header" style="text-align: center;">
        <img src="{{ public_path('storage/img/seal_logo.jpg') }}" alt=""
        style="width: 100px; float: left">
        <div style="margin-top: 18px; margin-right: 100px;">
            <p class="text-header">Republic of the Philippines City of General Santos</p>
            <p class="text-header">Office of the City Mayor - AKLAT</p>
            <p class="text-header"><i>EduKAR GenSan Scholarship Program</i></p>
        </div>
    </div>
    <h4 style="margin-top: 50px">
        Annual Data Report of Applications: <span style="font-weight: normal">{{ $year .' - ' . $year + 1 }}</span>
    </h4>
    <div id="backround-wrapper">
        <table style="margin-top: 20px">
            <tr style="text-align: left;">
                <td colspan="5" style="font-size: 18px; padding-top: 12px;  padding-bottom: 12px">
                    <p class="text-header" style="margin-left: 20px">
                        No. of applicants in every school
                    </p>
                </td>
            </tr>
            <tr>
                <th>Schools</th>
                <th>Applicants</th>
                <th>Not Evaluated</th>
                <th>Qualified</th>
                <th>Rejected</th>
            </tr>
            @php
                $index = 0;
            @endphp
            @foreach ($schoolApplicantsCount as $school => $count)
                @php
                    $notEvaluated = 0;
                    $qualified = 0;
                    $rejected = 0;
                @endphp
                <tr>
                    <td>
                        {{ $school }}
                    </td>
                    <td>
                        {{ $count }}
                    </td>
                    <td>
                        @foreach ($applicantList as $list)
                            @php
                                if($list->review == null){
                                    if($list->applicant->first()->school->desired_school === $school){
                                        $notEvaluated++;
                                    }
                                }
                            @endphp
                        @endforeach
                        {{ $notEvaluated }}
                    </td>
                    <td>
                        @foreach ($qualifiedApplicants as $list)
                            @php
                                if($list->applicant->first()->school->desired_school === $school){
                                        $qualified++;
                                    }
                            @endphp
                        @endforeach
                        {{ $qualified }}
                    </td>
                    <td>
                        @foreach ($rejectedApplicants as $list)
                            @php
                                if($list->applicant->first()->school->desired_school === $school){
                                        $rejected++;
                                    }
                            @endphp
                        @endforeach
                        {{ $rejected }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" style="text-align: right; font-size: 18px; padding-top: 13px;  padding-bottom: 13px">
                    <p style="margin: 0; margin-right: 20px; padding: 0">Total Applicants: {{ $applicantList->count() }}</p>
                </td>
            </tr>
        </table>

        {{-- <div class="page-break"></div> --}}

        <table style="margin-top: 40px">
            <tr style="text-align: left;">
                <td colspan="7" style="font-size: 18px; padding-top: 12px;  padding-bottom: 12px">
                    <p class="text-header" style="margin-left: 20px">
                        No. of applicants in every family income range
                    </p>
                </td>
            </tr>
            <tr>
                <th>Less than 10,957</th>
                <th>10,957 to 21,194</th>
                <th>21,194 to 43,828</th>
                <th>43,828 to 76,669</th>
                <th>76,669 to 131,484</th>
                <th>131,484 to 219,140</th>
                <th>219,140 and above</th>
            </tr>
            @php
                $bracket1 = 0;
                $bracket2 = 0;
                $bracket3 = 0;
                $bracket4 = 0;
                $bracket5 = 0;
                $bracket6 = 0;
                $bracket7 = 0;
            @endphp
            @foreach ($applicantList as $list)
                @switch($list->applicant->first()->family_income)
                    @case('Less than ₱10,957')
                        @php
                            $bracket1++;
                        @endphp
                        @break
                    @case('₱10,957 to ₱21,194')
                        @php
                            $bracket2++;
                        @endphp
                        @break
                    @case('₱21,194 to ₱43,828')
                        @php
                            $bracket3++;
                        @endphp
                        @break
                    @case('₱43,828 to ₱76,669')
                        @php
                            $bracket4++;
                        @endphp
                        @break
                    @case('₱76,669 to ₱131,484')
                        @php
                            $bracket5++;
                        @endphp
                        @break
                    @case('₱131,484 to ₱219,140')
                        @php
                            $bracket6++;
                        @endphp
                        @break
                    @case('₱219,140 and above')
                        @php
                            $bracket7++;
                        @endphp
                        @break
                @endswitch
            @endforeach
            <tr>
                <td>{{ $bracket1 }}</td>
                <td>{{ $bracket2 }}</td>
                <td>{{ $bracket3 }}</td>
                <td>{{ $bracket4 }}</td>
                <td>{{ $bracket5 }}</td>
                <td>{{ $bracket6 }}</td>
                <td>{{ $bracket7 }}</td>
            </tr>
            <tr>
                <td>{{ round($bracket1 * 100 / $applicantList->count(), 2) }}%</td>
                <td>{{ round($bracket2 * 100 / $applicantList->count(), 2) }}%</td>
                <td>{{ round($bracket3 * 100 / $applicantList->count(), 2) }}%</td>
                <td>{{ round($bracket4 * 100 / $applicantList->count(), 2) }}%</td>
                <td>{{ round($bracket5 * 100 / $applicantList->count(), 2) }}%</td>
                <td>{{ round($bracket6 * 100 / $applicantList->count(), 2) }}%</td>
                <td>{{ round($bracket7 * 100 / $applicantList->count(), 2) }}%</td>
            </tr>

        </table>
    </div>
    <div id="signature" style="float: right; margin-top: 50px; margin-bottom: 0;">
        <p style="margin: 0">____________________</p>
        <p style="margin-top: 10px">Scholarship Coordinator</p>
    </div>
    <footer style="position: fixed; left: 0; bottom: 0">
        <img src="{{ public_path('storage/img/footer_logo.png') }}" style="width: 100%;">
    </footer>
</body>
</html>
