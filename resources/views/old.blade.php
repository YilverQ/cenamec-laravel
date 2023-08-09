$administrators = Administrator::join('users', 'administrators.user_id', '=', 'users.id')
                            ->get(['administrators.*', 'users.*']);