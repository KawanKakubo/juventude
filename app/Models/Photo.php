<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'image_path',
        'video_url', // Novo campo
        'type',      // Novo campo
        'caption',
        'order'
    ];

    // Helper para extrair o ID do vídeo do YouTube
    public function getYoutubeIdAttribute()
    {
        if ($this->type !== 'video' || !$this->video_url) return null;

        // Regex para pegar ID de URLs completas ou encurtadas (youtu.be)
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->video_url, $match);
        
        return $match[1] ?? null;
    }
    
    // Helper para pegar a thumbnail do YouTube
    public function getYoutubeThumbAttribute()
    {
        $id = $this->youtube_id;
        return $id ? "https://img.youtube.com/vi/{$id}/mqdefault.jpg" : null;
    }
}