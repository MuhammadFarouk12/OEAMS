using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace OEAMS
{
    public partial class Landing : Form
    {
        public static string connectionString = "Server=localhost;Database=OEAMS;User Id=root;Password=1234567890;SslMode=none;";
        private string password = "admin";
        public Landing()
        {
            InitializeComponent();
        }

        private void Landing_Load(object sender, EventArgs e)
        {
        }

        private void guna2HtmlLabel1_Click(object sender, EventArgs e)
        {

        }

        private void btn_enterSystem_Click(object sender, EventArgs e)
        {
            if (txb_adminPassword.Text == this.password)
            {
                Helper.MoveFromTo(this, new Students());
            }
            else
            {
                MessageBox.Show("Hmmm...Not Exactly\nTry Again");
            }
        }
    }
}
