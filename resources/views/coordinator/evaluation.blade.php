<x-layout title="Rating Evaluation">
    <section>
        <x-container class="w-75">
            <div class="row">
                <h4 class="mt-2">Applicant Evaluation</h4>
            </div>
            <x-table.table>
                <tr>
                    <td colspan="3" class="text-center">
                        <div class="h5 mt-1 mb-1 fw-bold">Phase 1</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <div class="h5 mt-1 mb-1 fw-bold">Required</div>
                    </td>
                    <td class="text-center">
                        <div class="h5 mt-1 mb-1 fw-bold">Applicant</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        Educational Attainment (College)
                    </td>
                    <td>
                        <x-evaluation.row-col>
                            <x-slot name="first">
                                {{ $applicantlist->applicant->first()->educational_attainment }}
                            </x-slot>
                            <x-slot name="second">
                                @if ($applicantlist->applicant->first()->educational_attainment === "Yes")
                                    <x-evaluation.badge-success>Passed</x-evaluation.badge-success>
                                @else
                                    <x-evaluation.badge-danger>Failed</x-evaluation.badge-danger>
                                @endif
                            </x-slot>
                        </x-evaluation.row-col>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        Nationality (Filipino)
                    </td>
                    <td>
                        <x-evaluation.row-col>
                            <x-slot name="first">
                                {{ $applicantlist->applicant->first()->nationality }}
                            </x-slot>
                            <x-slot name="second">
                                @if ($applicantlist->applicant->first()->nationality === "Yes")
                                    <x-evaluation.badge-success>Passed</x-evaluation.badge-success>
                                @else
                                    <x-evaluation.badge-danger>Failed</x-evaluation.badge-danger>
                                @endif
                            </x-slot>
                        </x-evaluation.row-col>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        Registered Voter (Applicant or Guardian)
                    </td>
                    <td>
                        <x-evaluation.row-col>
                            <x-slot name="first">
                                {{ $applicantlist->applicant->first()->registered_voter }}
                            </x-slot>
                            <x-slot name="second">
                                @if ($applicantlist->applicant->first()->registered_voter === "Yes")
                                    <x-evaluation.badge-success>Passed</x-evaluation.badge-success>
                                @else
                                    <x-evaluation.badge-danger>Failed</x-evaluation.badge-danger>
                                @endif
                            </x-slot>
                        </x-evaluation.row-col>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        City
                    </td>
                    <td>
                        <x-evaluation.row-col>
                            <x-slot name="first">
                                {{ $applicantlist->applicant->first()->address->city }}
                            </x-slot>
                            <x-slot name="second">
                                @if ($applicantlist->applicant->first()->address->city === "General Santos")
                                    <x-evaluation.badge-success>Passed</x-evaluation.badge-success>
                                @else
                                    <x-evaluation.badge-danger>Failed</x-evaluation.badge-danger>
                                @endif
                            </x-slot>
                        </x-evaluation.row-col>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <div class="h5 mt-1 mb-1 fw-bold">Phase 2</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center h6">
                        No. years in city (3 years or more)
                    </td>
                    <td>
                        @if ($applicantlist->applicant->first()->years_in_city == 1 && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->years_in_city }} year and below
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>3 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @elseif ($applicantlist->applicant->first()->years_in_city == 2 && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->years_in_city }} years
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>7 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @elseif($applicantlist->applicant->first()->years_in_city == 3 && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->years_in_city }} years
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>15 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @else
                            <div class="d-flex justify-content-center">
                                <x-evaluation.badge-danger>0 %</x-evaluation.badge-danger>
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="text-center h6">
                        General Weighted Average
                    </td>
                    <td>
                        @if ($applicantlist->applicant->first()->gwa >= 80 &&  $applicantlist->ratingReport->rating != 0)
                        <x-evaluation.row-col>
                            <x-slot name="first">
                                {{ $applicantlist->applicant->first()->gwa }}
                            </x-slot>
                            <x-slot name="second">
                                <x-evaluation.badge-success>35 %</x-evaluation.badge-success>
                            </x-slot>
                        </x-evaluation.row-col>
                    @elseif (($applicantlist->applicant->first()->gwa < 80 && $applicantlist->applicant->first()->gwa > 74)
                    && $applicantlist->ratingReport->rating != 0)
                        <x-evaluation.row-col>
                            <x-slot name="first">
                                {{ $applicantlist->applicant->first()->gwa }}
                            </x-slot>
                            <x-slot name="second">
                                <x-evaluation.badge-success>17 %</x-evaluation.badge-success>
                            </x-slot>
                        </x-evaluation.row-col>
                    @elseif($applicantlist->applicant->first()->gwa < 75 && $applicantlist->ratingReport->rating != 0)
                        <x-evaluation.row-col>
                            <x-slot name="first">
                                {{ $applicantlist->applicant->first()->gwa }}
                            </x-slot>
                            <x-slot name="second">
                                <x-evaluation.badge-success>8 %</x-evaluation.badge-success>
                            </x-slot>
                        </x-evaluation.row-col>
                    @else
                        <div class="col d-flex justify-content-center">
                            <x-evaluation.badge-danger>0 %</x-evaluation.badge-danger>
                        </div>
                    @endif
                    </td>
                </tr>
                <tr>
                    <td class="text-center h6">
                       Family Income
                    </td>
                    <td>
                        @if ($applicantlist->applicant->first()->family_income === "Less than ₱10,957" && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->family_income }}
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>50 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @elseif ($applicantlist->applicant->first()->family_income === "₱10,957 to ₱21,194" && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->family_income }}
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>42 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @elseif($applicantlist->applicant->first()->family_income === "₱21,194 to ₱43,828" && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->family_income }}
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>35 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @elseif($applicantlist->applicant->first()->family_income === "₱43,828 to ₱76,669" && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->family_income }}
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>28 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @elseif($applicantlist->applicant->first()->family_income === "₱76,669 to ₱131,484" && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->family_income }}
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>21 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @elseif($applicantlist->applicant->first()->family_income === "₱131,484 to ₱219,140" && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->family_income }}
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>14 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @elseif($applicantlist->applicant->first()->family_income === "₱219,140 and above" && $applicantlist->ratingReport->rating != 0)
                            <x-evaluation.row-col>
                                <x-slot name="first">
                                    {{ $applicantlist->applicant->first()->family_income }}
                                </x-slot>
                                <x-slot name="second">
                                    <x-evaluation.badge-success>7 %</x-evaluation.badge-success>
                                </x-slot>
                            </x-evaluation.row-col>
                        @else
                            <div class="col d-flex justify-content-center">
                                <x-evaluation.badge-danger>0 %</x-evaluation.badge-danger>
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <div class="h5 mt-1 mb-1">
                            Total:
                            <span class="badge fw-bold {{ $applicantlist->ratingReport->rating != 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $applicantlist->ratingReport->rating }}%
                            </span>
                        </div>
                    </td>
                </tr>
            </x-table.table>
        </x-container>
    </section>
</x-layout>
