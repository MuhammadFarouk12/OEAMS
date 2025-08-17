# This is the demo of how to connect to the database:
```
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using MySql.Data.MySqlClient;

namespace OEAMS
{
    public partial class Landing : Form
    {
        public static string connectionString = "Server=localhost;Database=OEAMS;User Id=root;Password=1234567890;SslMode=none;";
        public Landing()
        {
            InitializeComponent();
        }

        private void Landing_Load(object sender, EventArgs e)
        {
            
        }

        private void guna2Button1_Click(object sender, EventArgs e)
        {
            MySqlConnection connection = new MySqlConnection(connectionString);
            try {
                MessageBox.Show("Hello world");
                connection.Open();
                MessageBox.Show("Hello world, opened");
                MySqlCommand insertCommand = new MySqlCommand("insert into STUDENT(FIRST_NAME, MIDDLE_NAMES, LAST_NAME, PHONE_NUMBER) values(@first_name, @middle_names, @last_name, @phone_number)", connection);

                insertCommand.Parameters.AddWithValue("@first_name", "Ady");
                insertCommand.Parameters.AddWithValue("@last_name", "Khosafy");
                insertCommand.Parameters.AddWithValue("@middle_names", "Null");
                insertCommand.Parameters.AddWithValue("@phone_number", "774449936");

                insertCommand.ExecuteNonQuery();
                MessageBox.Show("Hello world, inserted");
            }
            catch(Exception ex)
            {
                MessageBox.Show(ex.Message);
            } finally
            {
                connection.Close(); 
            }
        }
    }
}
```
