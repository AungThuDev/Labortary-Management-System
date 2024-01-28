<?php
    if (!function_exists('getCurrentMemberCount')) {
        function getCurrentMemberCount()
        {
            $currentMemberStatus = config('members.member_status.CurrentMember');
            return \App\Models\Member::where('status', $currentMemberStatus)->count();
        }
    }