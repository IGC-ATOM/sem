Imports System.Data.OleDb

Public Class HomePage2

    Inherits System.Web.UI.Page

    Dim con As New OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=C:\Users\Lenovo\OneDrive\Documents\Data.accdb")
    Dim cmd As New OleDbCommand
    Dim ad As New OleDbDataAdapter
    Dim ds As New DataSet

    Sub display()
        con.Open()
        cmd.CommandText = "SELECT * FROM Book_CAT"
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        ds.Clear()
        ad.Fill(ds, "Book_CAT")
        GridView1.DataSource = ds.Tables("Book_CAT")
        con.Close()
        GridView1.DataBind()
    End Sub



    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        display()
    End Sub

    Protected Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        con.Open()
        cmd.CommandText = "INSERT INTO Book_CAT VALUES(@id, @auhtor, @book, @price)"
        cmd.Parameters.AddWithValue("@id", Val(TextBox1.Text))
        cmd.Parameters.AddWithValue("@author", TextBox2.Text)
        cmd.Parameters.AddWithValue("@book", TextBox3.Text)
        cmd.Parameters.AddWithValue("@price", Val(TextBox4.Text))
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        cmd.Parameters.Clear()
        con.Close()

        display()
    End Sub

    Protected Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        con.Open()
        cmd.CommandText = "UPDATE Book_CAT SET BAuthor='" & TextBox2.Text & "', BBook='" & TextBox3.Text & "' WHERE ID=" & Val(TextBox1.Text)
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        cmd.Parameters.Clear()
        con.Close()

        display()
    End Sub

    Protected Sub Button3_Click(sender As Object, e As EventArgs) Handles Button3.Click
        con.Open()
        cmd.CommandText = "DELETE FROM Book_CAT WHERE ID=@id"
        cmd.Parameters.AddWithValue("@id", Val(TextBox1.Text))
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        cmd.Parameters.Clear()
        con.Close()

        display()
    End Sub
End Class