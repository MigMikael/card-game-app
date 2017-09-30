<?php

namespace App\Http\Controllers;

use App\Events\ScoreUpdate;
use App\Card;
use App\User;
use Illuminate\Http\Request;


class CardController extends Controller
{
    public function show(Card $card)
    {
        $user = auth()->user();
        $user->score = $user->score + $card->value;
        $user->save();

        // broadcast 'ScoreUpdate' event
        event(new ScoreUpdate($user));

        return redirect()->back()->withValue($card->value);
    }

    public function leaderBoard()
    {
        return User::all(['id', 'name', 'score']);
    }
}
