using System;
using System.Collections.Generic;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace OEAMS
{
    public static class Helper
    {
        public static Color PrimaryColor = Color.FromArgb(0, 120, 212);
        //public static Color SecondaryColor = Color.FromArgb(255, 249, 175);
        //public static Color PurpleColor = Color.FromArgb(178, 176, 232);
        public static void MoveFromTo(Form form1, Form form2)
        {
            form1.Hide();
            form2.Show();
        }
    }
}
