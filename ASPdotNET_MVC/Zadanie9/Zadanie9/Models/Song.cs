using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace Zadanie9.Models
{
    public class Song
    {
        [Required(ErrorMessage = "Name is required!")]
        [StringLength(100, ErrorMessage = "Maximal length of the name of a song is 100 charachters!")]
        public string Name { get; set; }

        [Required(ErrorMessage = "Artist name is required!")]
        [StringLength(100, ErrorMessage = "Maximal length of the artist name is 100 charachters!")]
        public string Artist { get; set; }

        public int GenreId { get; set; }
        public int Id { get; set; }
        
        [ForeignKey("GenreId")]
        public virtual Genre SongGenre { get; set; }

        public Song() { }

        public Song(int id, string name, string artist, int genreId)
        {
            Id = id;
            Name = name;
            Artist = artist;
            GenreId = genreId;
        }
    }
}