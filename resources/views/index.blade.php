@extends('layouts.master')
@php
    $applicantSkillCount = 0;
    $rowCount = 0;
@endphp

<div id="page">
    <table class="job-applicants">
        <thead>
            <tr>
                <th>Job</th>
                <th>Applicant Name</th>
                <th>Email Address</th>
                <th>Website</th>
                <th>Skills</th>
                <th>Cover Letter Paragraph</th>
            </tr>
        </thead>

        @foreach($jobs as $job)
            @foreach($job->applicants as $applicant)
                {{-- count for many rows are needed for each job --}}
                @php ($rowCount= $rowCount+ count($applicant->skills))
            @endforeach

            <tr>
                <td rowspan="{{$rowCount+1}}" class="job-name">{{$job->name}}</td>
            </tr>

            @foreach($job->applicants as $applicant)
                @php($applicantSkillCount = count($applicant->skills))
                <tr>
                    <td rowspan="{{$applicantSkillCount}}" class="applicant-name">
                        {{$applicant->name}}
                    </td>

                    <td rowspan="{{$applicantSkillCount}}">
                        @if(!empty($applicant->email))
                            <a href="mailto:{{$applicant->email}}">{{$applicant->email}}</a>
                        @else
                            --
                        @endif
                    </td>

                    <td rowspan="{{$applicantSkillCount}}">
                        @if(!empty($applicant->website))
                            <a href="{{$applicant->website}}">{{$applicant->website}}</a>
                        @else
                            --
                        @endif
                    </td>

                    <td>
                        {{$applicant->skills[0]->name}}
                    </td>

                    <td rowspan="{{$applicantSkillCount}}">
                        {{$applicant->cover_letter}}
                    </td>

                </tr>
                @php($firstSkill = true)
                @foreach($applicant->skills as $skill)

                    @if(!$firstSkill)
                        <tr>
                            <td>{{$skill->name}}</td>
                        </tr>

                    @else
                        @php($firstSkill = false)

                    @endif

                @endforeach {{--end skills loop--}}
            @endforeach {{--end applicants loop--}}
        @endforeach{{--end jobs loop--}}

        <tfoot>
            <tr>
                <td colspan="6">
                    {{$applicantsCount}} Applicants, {{$skillsCount}} Unique Skills
                </td>
            </tr>
        </tfoot>
    </table>
</div>