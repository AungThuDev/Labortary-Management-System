<?php
    if (!function_exists('getFormerMemberCount')) {
        function getFormerMemberCount()
        {
            $FormerMemberStatus = config('members.member_status.FormerMember');
            return \App\Models\Member::where('status', $FormerMemberStatus)->count();
        }
    }