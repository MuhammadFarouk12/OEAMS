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
    public partial class Students : Form
    {
        public Students()
        {
            InitializeComponent();
        }

        private void Students_Load(object sender, EventArgs e)
        {

        }

        private void guna2TextBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void dgv_students_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void btn_addStudent_Click(object sender, EventArgs e)
        {
            Helper.SQLInsert("STUDENT", new[] {"FIRST_NAME", "MIDDLE_NAMES", "LAST_NAME", "PHONE_NUMBER"}, new[] {txb_studentFirstName, txb_studentMiddleNames,txb_studentLastName, txb_studentPhoneNumber});
        }
    }
}