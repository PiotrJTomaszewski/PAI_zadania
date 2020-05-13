using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace Zadanie9.Models
{
    public class Genre
    {
        public int Id { get; set; }

        [Required(ErrorMessage = "Name is required!")]
        [StringLength(100, ErrorMessage = "Maximal length of the genre's name is 100 charachters!")]
        public string Name { get; set; }

        public ICollection<Song> SongCollection;

        public Genre() { }

        public Genre(int id, string name)
        {
            Id = id;
            Name = name;
        }

    }
}