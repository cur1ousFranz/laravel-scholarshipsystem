<x-layout title="Summary Evaluation">
    <section>
        <x-container class="w-75">
            <div class="row">
                <div class="col-lg d-flex">
                    <h4 class="mt-2">Summary</h4>
                    <p class="mt-2 ms-3" data-bs-toggle="modal" data-bs-target="#infoModal">
                        <i class="bi bi-info-circle"></i>
                    </p>
                </div>

                <div class="modal fade" id="infoModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="bi bi-info-circle"></i>
                                    Pre evaluation
                                </h5>
                                <button type="button" class="close border-0 float-start" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-light" style="max-height: 500px; overflow-y: auto">
                              <x-table.table>
                                <tr class="text-center">
                                    <td>Educational Attainment (College)</td>
                                    <td>Yes</td>
                                </tr>
                                <tr class="text-center">
                                    <td >Nationality (Filipino)</td>
                                    <td>Yes</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Registered Voter (Applicant or Guardian)</td>
                                    <td>Yes</td>
                                </tr>
                                <tr class="text-center">
                                    <td>City</td>
                                    <td>General Santos</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <div class="h5 mt-1 mb-1 fw-bold">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">No. years in city (3 years or more)</td>
                                    <td>
                                        <ul class="list-group border-0">
                                            <li class="list-group-item border-0">
                                                3 years and above
                                                <x-evaluation.badge-success class="float-end mt-1">15%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                2 years
                                                <x-evaluation.badge-success class="float-end mt-1">7%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                1 year and below
                                                <x-evaluation.badge-success class="float-end mt-1">3%</x-evaluation.badge-success>
                                            </li>
                                          </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">General Weighted Average</td>
                                    <td>
                                        <ul class="list-group border-0">
                                            <li class="list-group-item border-0">
                                                80 and above
                                                <x-evaluation.badge-success class="float-end mt-1">35%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                79 - 75
                                                <x-evaluation.badge-success class="float-end mt-1">17%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                74 and below
                                                <x-evaluation.badge-success class="float-end mt-1">8%</x-evaluation.badge-success>
                                            </li>
                                          </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">Family Income</td>
                                    <td>
                                        <ul class="list-group border-0">
                                            <li class="list-group-item border-0">
                                                Less than ₱10,957
                                                <x-evaluation.badge-success class="float-end mt-1">50%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                ₱10,957 to ₱21,194
                                                <x-evaluation.badge-success class="float-end mt-1">42%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                ₱21,194 to ₱43,828
                                                <x-evaluation.badge-success class="float-end mt-1">35%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                ₱43,828 to ₱76,669
                                                <x-evaluation.badge-success class="float-end mt-1">28%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                ₱76,669 to ₱131,484
                                                <x-evaluation.badge-success class="float-end mt-1">21%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                ₱131,484 to ₱219,140
                                                <x-evaluation.badge-success class="float-end mt-1">14%</x-evaluation.badge-success>
                                            </li>
                                            <li class="list-group-item border-0">
                                                ₱219,140 and above
                                                <x-evaluation.badge-success class="float-end mt-1">7%</x-evaluation.badge-success>
                                            </li>
                                          </ul>
                                    </td>
                                </tr>
                              </x-table.table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <x-table.table>
                <tr>
                    <td colspan="3" class="text-center">
                        <div class="h5 mt-1 mb-1 fw-bold">Pre evaluation</div>
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
                        <div class="h5 mt-1 mb-1 fw-bold">&nbsp;</div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center h6">
                        No. years in city (3 years and above)
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
